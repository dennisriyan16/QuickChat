<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Chat extends Controller
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        return view('chat');
    }

    public function getUsers()
    {
        $userModel = new UserModel();
        $currentUserId = session()->get('user_id');
        $users = $userModel->where('id !=', $currentUserId)->findAll();

        return $this->response->setJSON($users);
    }

    public function getMessages($receiver_id)
    {
        $messageModel = new MessageModel();
        $sender_id = session()->get('user_id');
        $messages = $messageModel->getMessages($sender_id, $receiver_id);

        return $this->response->setJSON($messages);
    }

    public function send()
    {
        $messageModel = new MessageModel();
        $data = [
            'sender_id' => session()->get('user_id'),
            'receiver_id' => $this->request->getPost('receiver_id'),
            'message' => $this->request->getPost('message'),
        ];

        if ($messageModel->save($data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error'], 500);
        }
    }
}
