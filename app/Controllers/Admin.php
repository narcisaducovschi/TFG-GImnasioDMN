<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TareaModel;

class Admin extends BaseController
{
    public function getTrabajadores()
    {
        $userModel = new UserModel();
        $data['trabajadores'] = $userModel->where('id_rol', 2)->findAll();
        
        return view('admin/setTask', $data);
    }
    public function saveTask()
    {
        
        $idUsuario   = $this->request->getPost('id_usuario');
        $descripcion = $this->request->getPost('descripcion');
        $fecha       = $this->request->getPost('fecha_ejecucion');

        if (empty($idUsuario) || empty($descripcion) || empty($fecha)) {
            return redirect()->back()->with('error', 'Por favor, rellena todos los campos.');
        }

        $tareaModel = new TareaModel();
        $tareaModel->insert([
            'id_usuario'      => $idUsuario,
            'descripcion'     => $descripcion,
            'fecha_ejecucion' => $fecha
        ]);
        return redirect()->to('admin/setTask')->with('success', 'Tarea asignada correctamente');
    }
}