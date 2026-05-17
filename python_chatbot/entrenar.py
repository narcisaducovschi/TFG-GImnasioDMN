import random
import json
import pickle
import numpy as np
import nltk
from nltk.stem import WordNetLemmatizer
from keras.models import Sequential
from keras.layers import Dense, Dropout, Input
from keras.optimizers import SGD
from keras.optimizers.schedules import ExponentialDecay

nltk.download('punkt', quiet=True)
nltk.download('punkt_tab', quiet=True)
nltk.download('wordnet', quiet=True)

lemmatizer = WordNetLemmatizer()

with open('respuestas.json', encoding='utf-8') as f:
    datos = json.load(f)

palabras = []
clases = []
documentos = []
ignorar_letras = ['?', '!', '¿', '.', ',']

for dato in datos['intenciones']:
    for patron in dato['patrones']:
        tokens = nltk.word_tokenize(patron)
        palabras.extend(tokens)
        documentos.append((tokens, dato['tag']))
        if dato['tag'] not in clases:
            clases.append(dato['tag'])

palabras = [lemmatizer.lemmatize(p.lower()) for p in palabras if p not in ignorar_letras]
palabras = sorted(set(palabras))
clases = sorted(clases)

pickle.dump(palabras, open('palabras_cb.pk1', 'wb'))
pickle.dump(clases,   open('clases_cb.pk1',   'wb'))

training = []
output_empty = [0] * len(clases)

for documento in documentos:
    bolsa = []
    palabras_patrones = [lemmatizer.lemmatize(p.lower()) for p in documento[0]]
    for palabra in palabras:
        bolsa.append(1 if palabra in palabras_patrones else 0)
    output_row = list(output_empty)
    output_row[clases.index(documento[1])] = 1
    training.append([bolsa, output_row])

random.shuffle(training)
train_x = np.array([item[0] for item in training])
train_y = np.array([item[1] for item in training])

modelo = Sequential([
    Input(shape=(train_x.shape[1],)),
    Dense(128, activation='relu'),
    Dropout(0.5),
    Dense(64, activation='relu'),
    Dropout(0.5),
    Dense(train_y.shape[1], activation='softmax')
])

lr_schedule = ExponentialDecay(initial_learning_rate=0.001, decay_steps=10000, decay_rate=0.9)
sgd = SGD(learning_rate=lr_schedule, momentum=0.9, nesterov=True)
modelo.compile(loss='categorical_crossentropy', optimizer=sgd, metrics=['accuracy'])

modelo.fit(train_x, train_y, epochs=100, batch_size=5, verbose=1)

pesos = modelo.get_weights()
np.save('chatbot_pesos.npy', np.array(pesos, dtype=object), allow_pickle=True)
print(f'\nEntrenamiento completado.')
print(f'Palabras: {len(palabras)}, Clases: {len(clases)}')
print('Archivos generados: palabras_cb.pk1, clases_cb.pk1, chatbot_pesos.npy')
