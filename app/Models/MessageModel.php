<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sender_id', 'receiver_id', 'message', 'created_at'];

    public function getMessages($sender_id, $receiver_id)
    {
        return $this->where("(sender_id = $sender_id AND receiver_id = $receiver_id)")
            ->orWhere("(sender_id = $receiver_id AND receiver_id = $sender_id)")
            ->orderBy('created_at', 'ASC')
            ->findAll();
    }
}
