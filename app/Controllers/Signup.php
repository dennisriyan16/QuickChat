<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Signup extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function register()
    {
        $userModel = new UserModel();

        $rules = [
            'username' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($userModel->save($data)) {
            return redirect()->to(base_url('login'))->with('success', 'Registration successful! You can now login.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
