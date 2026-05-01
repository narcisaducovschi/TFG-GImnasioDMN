<?php

namespace App\Models;

use CodeIgniter\Model;

class RutinaModel extends Model
{
    protected $table            = 'rutinas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['usuario_id', 'dia', 'grupo_muscular'];
    protected $validationRules = [
        'usuario_id'     => 'required|numeric',
        'dia'            => 'required|in_list[Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo]',
        'grupo_muscular' => 'required|min_length[3]|max_length[50]',
    ];

    protected $validationMessages = [
        'dia' => [
            'in_list' => 'El día de la semana no es válido.'
        ],
    ];

    protected $useTimestamps = true;

    public function getRutinaCompleta(int $usuarioId, string $dia)
    {
        return $this->db->table('rutinas')
            ->select('
                rutinas.id as rutina_id, 
                rutinas.grupo_muscular, 
                rutina_ejercicios.id as ejercicio_id,
                rutina_ejercicios.nombre_ejercicio, 
                rutina_ejercicios.series, 
                rutina_ejercicios.repeticiones, 
                rutina_ejercicios.notas
            ')
            ->join('rutina_ejercicios', 'rutina_ejercicios.rutina_id = rutinas.id', 'left')
            ->where('rutinas.usuario_id', $usuarioId)
            ->where('rutinas.dia', $dia)
            ->orderBy('rutina_ejercicios.id', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function addExercise(array $data)
    {
        if (empty($data['nombre_ejercicio']) || empty($data['series'])) {
            return false;
        }

        return $this->db->table('rutina_ejercicios')->insert($data);
    }
}