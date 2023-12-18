<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToArticles extends Migration
{
    public function up()
    {
        $this->forge->addColumn('articles', [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255, // Adjust the size as needed
                'null' => false, // Set to false to make it non-nullable
                'after' => 'content', // Change this to the desired position in the table
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('articles', 'image');
    }
}
