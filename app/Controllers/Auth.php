<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('auth/login');
    }
    public function register(): string
    {
        return view('auth/register');
    }
    public function processRegister()
    {
        $session = session();

        $password = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm_password');

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden');
        }

        $data = [
            'email' => $this->request->getPost('email'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nombre' => $this->request->getPost('nombre'),
            'apellidos' => $this->request->getPost('apellidos'),
            'telefono' => $this->request->getPost('telefono'),
            'direccion' => $this->request->getPost('direccion'),
            'direccion_extra' => $this->request->getPost('direccion_extra'),
            'codigo_postal' => $this->request->getPost('codigo_postal'),
            'ciudad' => $this->request->getPost('ciudad'),
            'id_rol' => 5,
        ];

        $session->set('register_data', $data);

        return redirect()->to('/payment');
    }

    public function payment()
    {
        return view('auth/payment');
    }

public function processLogin()
{
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('email', $email)->first();

    if (!$user) {
        return redirect()->to('/login')->with('error', 'El usuario no existe');
    }
    
    if (!password_verify($password, $user['password'])) {
        return redirect()->to('/login')->with('error', 'La contraseña es incorrecta');
    }

    $session = session();
    $rolId = (int)$user['id_rol'];

    $session->set([
        'user_id'    => $user['id'],
        'email'      => $user['email'],
        'nombre'     => $user['nombre'],
        'id_rol'     => $rolId,
        'isLoggedIn' => true
    ]);

    switch ($rolId) {
        case 1: // Admin: Gestionar usuarios
            return redirect()->to('/admin/usersAdmin');

        case 2: // Trabajador: Tareas asignadas
            return redirect()->to('/worker/myTasks');

        case 3: // Profesor: Ver sus clases
            return redirect()->to('/teacher/myClasses');

        case 4: // Support: Atención al cliente
            return redirect()->to('/support/tickets');

        case 5: // Socios
            return redirect()->to('/home');

        default:
            return redirect()->to('/');
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
