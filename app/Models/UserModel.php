<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'email',
        'password',
        'nombre',
        'apellidos',
        'telefono',
        'direccion',
        'direccion_extra',
        'codigo_postal',
        'ciudad',
        'id_suscription',
        'id_rol',
        'id_class'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'email' => 'required|valid_email',
        'password' => 'required|min_length[6]',
        'nombre' => 'required',
        'apellidos' => 'required',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}