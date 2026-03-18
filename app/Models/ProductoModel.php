<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombre',
        'descripcion',
        'grupo',
        'imagen',
        'stock',
        'precio'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'nombre' => 'required|min_length[3]',
        'descripcion' => 'required',
        'grupo' , 'required',
        'precio' => 'required|decimal',
        'stock' => 'required|integer'
    ];

    protected $validationMessages = [];

    protected $skipValidation = false;
}
