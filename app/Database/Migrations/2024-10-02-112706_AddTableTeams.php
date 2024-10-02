<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableTeams extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'   => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'description' => [
                'type'       => 'TEXT',
                'null'       => true, // Allow null in case description is optional
            ],
            'division' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'image_uuid'  => [
                'type'       => 'CHAR',
                'constraint' => '36', // Standard UUID length
                'null'       => true, // Allow null if image is optional
            ],
            'image_extension' => [
                'type'       => 'VARCHAR',
                'constraint' => '10', // File extensions like 'jpg', 'png', etc.
                'null'       => true, // Allow null if image is optional
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Set Primary Key
        $this->forge->addKey('id', true);

        // Create the table
        $this->forge->createTable('teams');
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('teams');
    }
}
