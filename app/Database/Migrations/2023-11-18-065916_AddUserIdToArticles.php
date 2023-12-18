<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToArticles extends Migration
{
    public function up()
    {
        $fields = [
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
               
            ]
        ];

        $this->forge->addColumn('articles', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('articles', 'user_id');
    }
}
