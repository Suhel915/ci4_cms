<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToArticles extends Migration
{
    public function up()
    {
        $this->forge->addColumn('articles', [
            'status' => [
                'type' => 'ENUM("publish", "draft")',
                'default' => 'draft'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('articles', 'status');
    }
}
