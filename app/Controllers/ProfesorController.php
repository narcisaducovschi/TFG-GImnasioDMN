<?php

namespace App\Controllers;

use App\Models\ClaseModel;

class ProfesorController extends BaseController
{
    public function misClases()
    {
        $claseModel = new ClaseModel();
        $idProfesor = session()->get('user_id');

        $data['clases'] = $claseModel->where('id_profesor', $idProfesor)
            ->orderBy('fecha', 'ASC')
            ->orderBy('hora', 'ASC')
            ->findAll();

        return view('profesor/mis_clases', $data);
    }
}
