<?php

namespace App\Controllers;

use App\Models\ChatModel;
use App\Models\UserModel;

class Chat extends BaseController
{
    public function index($receiverId = null)
    {
        $chatModel = new ChatModel();
        $myId = session()->get('user_id');

        $data['conversaciones'] = $chatModel->getChatList($myId);
        $data['mensajes'] = [];
        $data['receptor'] = null;

        if ($receiverId) {
            $userModel = new UserModel();
            $data['mensajes'] = $chatModel->getMessagesBetween($myId, $receiverId);
            $data['receptor'] = $userModel->find($receiverId);

            // Opcional: Marcar como leídos al abrir
            $chatModel->where(['id_sender' => $receiverId, 'id_receiver' => $myId])->set(['is_read' => 1])->update();
        }

        return view('chats/chats', $data);
    }

    public function sendMessage()
    {
        $chatModel = new \App\Models\ChatModel();
        $msg = $this->request->getPost('message');
        $to  = $this->request->getPost('id_receiver');

        if (!empty($msg) && !empty($to)) {
            $chatModel->insert([
                'id_sender'  => session()->get('user_id'),
                'id_receiver' => $to,
                'message'    => $msg,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Datos incompletos'], 400);
    }

    public function nuevo()
    {
        $userModel = new \App\Models\UserModel();
        $myId = session()->get('user_id');

        $data['usuarios'] = $userModel->where('id !=', $myId)->findAll();

        return view('chats/nuevo_chat', $data);
    }
}
