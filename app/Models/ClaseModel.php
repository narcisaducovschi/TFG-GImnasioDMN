<?php

namespace App\Models;

use CodeIgniter\Model;

class ClaseModel extends Model
{
    protected $table            = 'clases';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nombre',
        'id_profesor',
        'imagen',
        'fecha',
        'hora'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'nombre'      => 'required|min_length[3]|max_length[255]',
        'id_profesor' => 'required|is_natural_no_zero',
        'imagen'      => 'permit_empty|max_length[255]',
        'fecha'       => 'required|valid_date',
        'hora'        => 'required'
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getClasesFull()
    {
        return $this->select('clases.*, usuarios.nombre as profesor_nombre, usuarios.apellidos as profesor_apellidos')
                    ->join('usuarios', 'usuarios.id = clases.id_profesor')
                    ->findAll();
    }

    
}