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
        'id_suscripcion',
        'id_rol',
        'id_class',
        'stripe_customer_id'
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
    public function getReservasUsuario($userId)
    {
        return $this->db->table('reservas')
            ->select([
                'clases.nombre as nombre_clase',
                'clases.hora as hora',
                'clases.fecha as dia_semana',
                'clases.imagen as imagen',
                'profesores.nombre as nombre_profesor',
                'profesores.apellidos as apellidos_profesor'
            ])
            ->join('clases', 'clases.id = reservas.id_clase')
            ->join('usuarios as profesores', 'profesores.id = clases.id_profesor')
            ->where('reservas.id_usuario', $userId)
            ->get()
            ->getResultArray();
    }
}
