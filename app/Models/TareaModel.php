<?php

namespace App\Models;

use CodeIgniter\Model;

class TareaModel extends Model
{
    protected $table            = 'tareas';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_usuario', 'descripcion', 'fecha_ejecucion']; 
    protected $useTimestamps    = true; 
}