<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table            = 'reservas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_usuario', 'id_clase', 'estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_reserva';
    protected $updatedField  = '';

    public function existeConflictoHorario($userId, $fecha, $hora)
    {
        return $this->db->table($this->table)
            ->join('clases', 'clases.id = reservas.id_clase')
            ->where('reservas.id_usuario', $userId)
            ->where('clases.fecha', $fecha)
            ->where('clases.hora', $hora)
            ->where('reservas.estado', 'confirmada')
            ->countAllResults() > 0;
    }

    public function getReservasUsuario($userId)
    {
        return $this->select('reservas.*, clases.nombre, clases.fecha, clases.hora, usuarios.nombre as profesor_nombre')
            ->join('clases', 'clases.id = reservas.id_clase')
            ->join('usuarios', 'usuarios.id = clases.id_profesor')
            ->where('reservas.id_usuario', $userId)
            ->orderBy('clases.fecha', 'ASC')
            ->findAll();
    }
    public function tieneConflictoProximidad($userId, $fecha, $horaNueva)
    {
        $horaInicio = new \DateTime($horaNueva);
        // Margen inclusivo de 1 hora
        $margenInicio = (clone $horaInicio)->modify('-1 hour')->format('H:i:s');
        $margenFin    = (clone $horaInicio)->modify('+1 hour')->format('H:i:s');

        return $this->db->table('reservas')
            ->join('clases', 'clases.id = reservas.id_clase')
            ->where('reservas.id_usuario', $userId)
            ->where('clases.fecha', $fecha)
            ->groupStart()
            // Si la clase guardada está entre Nueva-1h y Nueva+1h, hay conflicto
            ->where('clases.hora >=', $margenInicio)
            ->where('clases.hora <=', $margenFin)
            ->groupEnd()
            ->where('reservas.estado', 'confirmada')
            ->countAllResults() > 0;
    }
}
