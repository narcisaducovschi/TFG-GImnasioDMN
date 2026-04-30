<?php

namespace App\Controllers;

use App\Models\TareaModel;

class Worker extends BaseController
{
    public function myTasks()
    {
        $session = session();
        $miID = $session->get('user_id');
        $filter = $this->request->getGet('filter');

        $tareaModel = new \App\Models\TareaModel();
        $query = $tareaModel->where('id_usuario', $miID);

        if ($filter === 'today') {
            $query->where('fecha_ejecucion', date('Y-m-d'));
        }

        $data['misTareas'] = $query->findAll();
        $data['filter'] = $filter;

        return view('worker/myTasks', $data);
    }

    public function completeTask($id)
    {
        $tareaModel = new \App\Models\TareaModel();
        $session = session();
        $miID = $session->get('user_id');

        $tarea = $tareaModel->where('id', $id)->where('id_usuario', $miID)->first();

        if ($tarea) {
            $tareaModel->delete($id);
            return redirect()->back()->with('success', '¡Tarea completada con éxito!');
        }

        return redirect()->back()->with('error', 'No se pudo completar la tarea.');
    }
}
