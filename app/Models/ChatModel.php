<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table      = 'mensajes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_sender', 'id_receiver', 'message', 'is_read', 'created_at'];

    public function getMessagesBetween($user1, $user2)
    {
        return $this->where("(id_sender = $user1 AND id_receiver = $user2)")
            ->orWhere("(id_sender = $user2 AND id_receiver = $user1)")
            ->orderBy('created_at', 'ASC')
            ->findAll();
    }

    public function getChatList($myId)
    {
        $db = \Config\Database::connect();

        $query = $db->query("
        SELECT u.id, u.nombre, u.apellidos, r.rol as rol,
        (SELECT message FROM mensajes WHERE (id_sender = u.id AND id_receiver = $myId) OR (id_sender = $myId AND id_receiver = u.id) ORDER BY created_at DESC LIMIT 1) as last_msg,
        (SELECT created_at FROM mensajes WHERE (id_sender = u.id AND id_receiver = $myId) OR (id_sender = $myId AND id_receiver = u.id) ORDER BY created_at DESC LIMIT 1) as last_time
        FROM usuarios u
        JOIN roles r ON u.id_rol = r.id
        WHERE u.id IN (
            SELECT DISTINCT id_sender FROM mensajes WHERE id_receiver = $myId
            UNION
            SELECT DISTINCT id_receiver FROM mensajes WHERE id_sender = $myId
        )
        ORDER BY last_time DESC
    ");

        return $query->getResultArray();
    }
}
