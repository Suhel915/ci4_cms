<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLastActivityColumnToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'last_activity' => [
                'type' => 'timestamp',
                'null' => true,
                'default' => null,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'last_activity');
    }
}
