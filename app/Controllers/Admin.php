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

    // Gestion de usuarios
    public function getUsers()
    {
        $userModel = new \App\Models\UserModel();

        $data = [
            'usuarios' => $userModel->paginate(10),
            'pager'    => $userModel->pager
        ];

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
                2 => 'Básica',
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

    public function createUser()
    {
        $data = [
            'roles' => [
                1 => 'Administrador',
                2 => 'Trabajador',
                3 => 'Profesor',
                4 => 'Soporte',
                5 => 'Socio'
            ],
            'suscripciones' => [
                1 => 'None',
                2 => 'Básica',
                3 => 'Premium'
            ]
        ];

        return view('admin/createUser', $data);
    }

    public function saveUser()
    {
        $userModel = new \App\Models\UserModel();

        $validationRules = [
            'nombre'         => 'required|min_length[3]|max_length[50]',
            'apellidos'      => 'required|min_length[3]|max_length[50]',
            'email'          => 'required|valid_email|is_unique[usuarios.email]',
            'password'       => 'required|min_length[6]',
            'id_rol'         => 'required|is_natural_no_zero',
            'id_suscripcion' => 'required|is_natural_no_zero'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre'         => $this->request->getPost('nombre'),
            'apellidos'      => $this->request->getPost('apellidos'),
            'email'          => $this->request->getPost('email'),
            'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'id_rol'         => (int)$this->request->getPost('id_rol'),
            'id_suscripcion' => (int)$this->request->getPost('id_suscripcion'),
        ];


        if ($userModel->insert($data)) {
            return redirect()->to('/admin/usersAdmin')->with('success', 'Usuario creado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error al crear el usuario.');
        }
    }

    public function deleteUser($id)
    {
        $userModel = new \App\Models\UserModel();

        if ($userModel->find($id)) {
            $userModel->delete($id);
            return redirect()->to('/admin/usersAdmin')->with('success', 'Usuario eliminado correctamente.');
        }

        return redirect()->to('/admin/usersAdmin')->with('error', 'El usuario no existe o ya fue eliminado.');
    }

    // Gestion de clases

    public function getClases()
    {
        $claseModel = new  \App\Models\ClaseModel();

        $data['clases'] = $claseModel->getClasesFull();

        return view('admin/clasesAdmin', $data);
    }

    public function editClase($id)
    {
        $claseModel = new \App\Models\ClaseModel();
        $userModel = new \App\Models\UserModel();

        $clase = $claseModel->find($id);
        if (!$clase) {
            return redirect()->to('admin/clasesAdmin')->with('error', 'Clase no encontrada.');
        }

        $data = [
            'clase' => $clase,
            'profesores' => $userModel->where('id_rol', 3)->findAll(),
        ];

        return view('admin/editClase', $data);
    }

    public function createClase()
    {
        $userModel = new \App\Models\UserModel();

        $data['profesores'] = $userModel->where('id_rol', 3)->findAll();

        return view('admin/createClase', $data);
    }

    public function saveClase()
    {
        $claseModel = new \App\Models\ClaseModel();


        $validationRules = [
            'nombre'      => 'required|min_length[3]',
            'id_profesor' => 'required|is_natural_no_zero',
            'fecha'       => 'required|valid_date',
            'hora'        => 'required',
            'imagen'      => 'uploaded[imagen]|max_size[imagen,2048]|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('imagen');
        $newName = $img->getRandomName();

        // Mover a la carpeta public/uploads/clases
        $img->move(FCPATH . 'uploads/clases', $newName);

        $claseModel->insert([
            'nombre'      => $this->request->getPost('nombre'),
            'id_profesor' => $this->request->getPost('id_profesor'),
            'fecha'       => $this->request->getPost('fecha'),
            'hora'        => $this->request->getPost('hora'),
            'imagen'      => $newName
        ]);

        return redirect()->to('admin/clasesAdmin')->with('success', 'Clase creada correctamente.');
    }
}
