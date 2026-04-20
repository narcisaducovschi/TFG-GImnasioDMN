<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function getTrabajadores()
    {
        $userModel = new UserModel();
        $trabajadores = $userModel->where('id_rol', 2)->findAll();
        return view('admin/setTask', $trabajadores);
    }
}
