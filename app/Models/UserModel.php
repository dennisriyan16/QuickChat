<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'created_at', 'updated_at', 'last_login', 'reset_code', 'reset_expires_at'];

    // Additional methods for authentication can be added here
}
