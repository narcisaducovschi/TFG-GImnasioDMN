<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table            = 'tickets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'asunto', 
        'descripcion', 
        'id_usuarios', 
        'estado', 
        'fecha_creacion'
    ];

    protected $useTimestamps = false;

    public function getPendientes()
    {
        return $this->where('estado', 'Abierto')
                    ->where("id NOT IN (SELECT id_ticket FROM ref_tickets_support)", null, false)
                    ->findAll();
    }

    public function getMisAsignados($userId)
    {
        return $this->select('tickets.*, ref_tickets_support.fecha_asignacion')
                    ->join('ref_tickets_support', 'ref_tickets_support.id_ticket = tickets.id')
                    ->where('ref_tickets_support.id_usuarios', $userId)
                    ->where('tickets.estado', 'Asignado')
                    ->findAll();
    }

    protected $validationRules = [
        'asunto'      => 'required|min_length[5]|max_length[255]',
        'descripcion' => 'required|min_length[10]',
        'id_usuarios' => 'required|is_natural_no_zero'
    ];

    protected $validationMessages = [
        'asunto' => [
            'required' => 'El asunto es obligatorio.',
            'min_length' => 'El asunto es demasiado corto.'
        ],
        'descripcion' => [
            'required' => 'Debes explicar detalladamente el problema.'
        ]
    ];
}