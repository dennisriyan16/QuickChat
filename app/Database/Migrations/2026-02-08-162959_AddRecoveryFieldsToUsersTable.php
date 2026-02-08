<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRecoveryFieldsToUsersTable extends Migration
{
    public function up()
    {
        $fields = [
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'last_login' => ['type' => 'DATETIME', 'null' => true],
            'reset_code' => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'reset_expires_at' => ['type' => 'DATETIME', 'null' => true],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['updated_at', 'last_login', 'reset_code', 'reset_expires_at']);
    }
}
