<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CommentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'feedback' => [
                'type' => 'TEXT',
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'article_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('user_id', 'users', 'id');
      
            $this->forge->addForeignKey('article_id', 'articles', 'id');
            $this->forge->createTable('comments');
            }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
