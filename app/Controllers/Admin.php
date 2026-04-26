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

    public function getUsers()
    {
        $userModel = new UserModel();
        $data['usuarios'] = $userModel->findAll();

        return view('admin/usersAdmin', $data);
    }

    public function editUser($id)
    {
        $userModel = new \App\Models\UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/admin/usersAdmin')->with('error', 'Usuario no encontrado.');
        }

        $data = [
            'user' => $user,
            'roles' => [
                1 => 'Administrador',
                2 => 'Trabajador',
                3 => 'Profesor',
                4 => 'Soporte',
                5 => 'Socio'
            ],
            'suscripciones' => [
                1 => 'Trabajador',
                2 => 'Básica' , 
                3 => 'Premium'
            ]
        ];

        return view('admin/editUser', $data);
    }

public function updateUser($id)
{
    $userModel = new \App\Models\UserModel();

    $validationRules = [
        'nombre'    => 'required|min_length[3]|max_length[50]',
        'apellidos' => 'required|min_length[3]|max_length[50]',
        'email'     => "required|valid_email|is_unique[usuarios.email,id,{$id}]",
        'id_rol'    => 'required|is_natural_no_zero',
        'id_suscripcion' => 'required|is_natural_no_zero'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
        'nombre'         => $this->request->getPost('nombre'),
        'apellidos'      => $this->request->getPost('apellidos'),
        'email'          => $this->request->getPost('email'),
        'id_rol'         => (int)$this->request->getPost('id_rol'),
        'id_suscripcion' => (int)$this->request->getPost('id_suscripcion'),
    ];

    if ($userModel->update($id, $data)) {
        return redirect()->to('/admin/usersAdmin')->with('success', 'Usuario actualizado correctamente.');
    } else {
        return redirect()->back()->with('error', 'No se pudieron guardar los cambios.');
    }
}
}
