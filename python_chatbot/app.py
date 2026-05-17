import os
import random
import json
import pickle

import numpy as np
import nltk
from flask import Flask, request, jsonify
from flask_cors import CORS
from nltk.stem import WordNetLemmatizer
from keras.models import Sequential
from keras.layers import Dense, Dropout, Input

nltk.download('punkt',     quiet=True)
nltk.download('punkt_tab', quiet=True)
nltk.download('wordnet',   quiet=True)

app = Flask(__name__)
CORS(app)

BASE_DIR = os.path.dirname(os.path.abspath(__file__))
lemmatizer = WordNetLemmatizer()

with open(os.path.join(BASE_DIR, 'respuestas.json'), encoding='utf-8') as f:
    intentos = json.load(f)

palabras = pickle.load(open(os.path.join(BASE_DIR, 'palabras_cb.pk1'), 'rb'))
clases   = pickle.load(open(os.path.join(BASE_DIR, 'clases_cb.pk1'),   'rb'))

model = Sequential([
    Input(shape=(len(palabras),)),
    Dense(128, activation='relu'),
    Dropout(0.5),
    Dense(64, activation='relu'),
    Dropout(0.5),
    Dense(len(clases), activation='softmax')
])
pesos = np.load(os.path.join(BASE_DIR, 'chatbot_pesos.npy'), allow_pickle=True)
model.set_weights(pesos)

print(f'Modelo cargado — palabras: {len(palabras)}, clases: {clases}')

def limpiar_sentencia(sentence):
    tokens = nltk.word_tokenize(sentence)
    return [lemmatizer.lemmatize(t.lower()) for t in tokens]

def bolsa_de_palabras(sentence):
    sentencia_palabras = limpiar_sentencia(sentence)
    bolsa = [0] * len(palabras)
    for pal in sentencia_palabras:
        for i, palabra in enumerate(palabras):
            if palabra == pal:
                bolsa[i] = 1
    return np.array(bolsa)

def predecir_clase(sentence):
    bow = bolsa_de_palabras(sentence)
    respuesta = model.predict(np.array([bow]), verbose=0)[0]
    ERROR_THRESHOLD = 0.3
    resultados = [[i, float(r)] for i, r in enumerate(respuesta) if r > ERROR_THRESHOLD]
    resultados.sort(key=lambda x: x[1], reverse=True)
    if resultados:
        return clases[resultados[0][0]]
    return None

def obtener_respuesta(tag):
    for intencion in intentos['intenciones']:
        if intencion['tag'] == tag:
            return random.choice(intencion['respuestas'])
    return 'No puedo ayudarte con eso. Contacta con soporte.'

@app.route('/chatbot/chat', methods=['POST'])
def chat():
    try:
        mensaje = request.json.get('mensaje', '')
        if not mensaje:
            return jsonify({'respuesta': 'No he recibido ningún mensaje.'}), 400
        tag = predecir_clase(mensaje)
        respuesta = obtener_respuesta(tag) if tag else 'No puedo ayudarte con eso. Contacta con soporte.'
        return jsonify({'respuesta': respuesta})
    except Exception as e:
        print(f'Error en /chatbot/chat: {e}')
        return jsonify({'respuesta': 'Error interno del servidor.'}), 500

if __name__ == '__main__':
    app.run(debug=True)
