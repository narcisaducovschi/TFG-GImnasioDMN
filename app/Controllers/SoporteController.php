<?php

namespace App\Controllers;

use App\Models\TicketModel;

class SoporteController extends BaseController
{
    protected $ticketModel;
    protected $db;

    public function __construct()
    {
        $this->ticketModel = new TicketModel();
        $this->db = \Config\Database::connect();
        helper(['text', 'url', 'form']);
    }
    public function misTickets()
    {
        $data['tickets'] = $this->ticketModel
            ->where('id_usuarios', session('user_id'))
            ->orderBy('fecha_creacion', 'DESC')
            ->findAll();

        return view('tickets/misTickets', $data);
    }

    public function guardarTicket()
    {
        $postData = [
            'asunto'      => $this->request->getPost('asunto'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_usuarios' => session('user_id'),
            'estado'      => 'Abierto'
        ];

        if ($this->ticketModel->save($postData)) {
            return redirect()->to('/tickets')->with('success', 'Ticket creado correctamente.');
        }

        return redirect()->back()->withInput()->with('errors', $this->ticketModel->errors());
    }


    public function bandejaPendientes()
    {
      
        $data['pendientes'] = $this->ticketModel->getPendientes();
        return view('soporte/bandeja_entrada', $data);
    }

    public function asignarTicket($idTicket)
    {
        // La transaccion pa que no se lo pillen dos a la vez
        $this->db->transStart();
        $this->db->table('ref_tickets_support')->insert([
            'id_ticket'   => $idTicket,
            'id_usuarios' => session('user_id') 
        ]);
        $this->ticketModel->update($idTicket, ['estado' => 'Asignado']);
        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return redirect()->back()->with('error', 'No se pudo asignar el ticket.');
        }

        return redirect()->to('/soporte/mis-casos')->with('success', 'Ticket asignado correctamente.');
    }

    public function misCasos()
    {
        $tecnicoId = session('user_id');
        $data['casos'] = $this->ticketModel->getMisAsignados($tecnicoId);
        
        return view('soporte/mis_casos', $data);
    }

    public function resolverTicket($idTicket)
    {
        if ($this->ticketModel->update($idTicket, ['estado' => 'Resuelto'])) {
            return redirect()->to('/soporte/mis-casos')->with('success', 'Ticket marcado como resuelto.');
        }
        
        return redirect()->back()->with('error', 'Error al actualizar el ticket.');
    }
}