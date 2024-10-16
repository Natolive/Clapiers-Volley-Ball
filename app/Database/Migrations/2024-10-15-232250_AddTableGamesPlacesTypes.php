<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableGamesPlacesTypes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'place' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('games_places_types');
    
    }

    public function down()
    {
        $this->forge->dropTable('games_places_types');
    }
}
