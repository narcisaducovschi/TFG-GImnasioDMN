<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RutinaModel;

class UserController extends BaseController
{
    protected $routineModel;
    protected $db;

    public function __construct()
    {
        $this->routineModel = new RutinaModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('users/index');
    }

    public function routine()
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }

        $diaRequest = $this->request->getGet('dia');
        $diaSeleccionado = ($diaRequest && in_array($diaRequest, DIAS_SEMANA)) ? $diaRequest : DIAS_SEMANA[date('l')];

        $ejercicios = $this->routineModel->getRutinaCompleta((int)$userId, $diaSeleccionado);
        $grupoMuscular = !empty($ejercicios) ? $ejercicios[0]['grupo_muscular'] : null;

        $data = [
            'diaActual'     => $diaSeleccionado,
            'ejercicios'    => $ejercicios,
            'grupoMuscular' => $grupoMuscular
        ];

        return view('users/routine/routine', $data);
    }

    public function createRoutine(): string
    {
        return view('users/routine/routine_new');
    }

    public function storeExercise()
    {
        $userId = session()->get('user_id');
        $dia = $this->request->getPost('dia');
        $grupoMuscular = $this->request->getPost('grupo_muscular');
        $nombres = $this->request->getPost('exercice_name');
        
        if (empty($nombres) || empty($nombres[0])) {
            return redirect()->back()->withInput()->with('error', 'Añade al menos un ejercicio.');
        }

        $this->db->transStart();

        $rutina = $this->routineModel->where(['usuario_id' => $userId, 'dia' => $dia])->first();

        if (!$rutina) {
            $rutinaId = $this->routineModel->insert([
                'usuario_id'     => $userId,
                'dia'            => $dia,
                'grupo_muscular' => $grupoMuscular
            ]);
        } else {
            $rutinaId = $rutina['id'];
            $this->routineModel->update($rutinaId, ['grupo_muscular' => $grupoMuscular]);
        }

        $series = $this->request->getPost('exercice_series');
        $reps   = $this->request->getPost('exercice_repetitions');
        $notas  = $this->request->getPost('exercice_notes');

        foreach ($nombres as $i => $nombre) {
            if (!empty($nombre)) {
                $this->routineModel->addExercise([
                    'rutina_id'        => $rutinaId,
                    'nombre_ejercicio' => $nombre,
                    'series'           => $series[$i],
                    'repeticiones'     => $reps[$i],
                    'notas'            => $notas[$i],
                ]);
            }
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return redirect()->back()->with('error', 'Error al guardar.');
        }

        return redirect()->to('/routine?dia=' . $dia)->with('success', 'Guardado.');
    }

    public function editExercise($id)
    {
        $ejercicio = $this->db->table('rutina_ejercicios')->where('id', $id)->get()->getRowArray();
        if (!$ejercicio) return redirect()->to('/routine');

        return view('users/routine/routine_edit', ['ejercicio' => $ejercicio]);
    }

    public function updateExercise($id)
    {
        $data = [
            'nombre_ejercicio' => $this->request->getPost('nombre_ejercicio'),
            'series'           => $this->request->getPost('series'),
            'repeticiones'     => $this->request->getPost('repeticiones'),
            'notas'            => $this->request->getPost('notas'),
        ];

        $this->db->table('rutina_ejercicios')->where('id', $id)->update($data);
        return redirect()->to('/routine')->with('success', 'Actualizado.');
    }

    public function deleteExercise($id)
    {
        $this->db->table('rutina_ejercicios')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Eliminado.');
    }
}