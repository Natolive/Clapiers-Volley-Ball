<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableGames extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'opposite_team' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'id_team' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
            ],
            'id_game_place_type' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
            ],
            'id_game_championship_type' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
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
        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('id_team', 'teams', 'id', 'RESTRICT', 'RESTRICT', 'games_id_team_foreign');
        $this->forge->addForeignKey('id_game_place_type', 'games_places_types', 'id', 'RESTRICT', 'RESTRICT' , 'games_id_game_place_type_foreign');
        $this->forge->addForeignKey('id_game_championship_type', 'games_championships_types', 'id', 'RESTRICT', 'RESTRICT', 'games_id_game_championship_type_foreign');

        $this->forge->createTable('games');
    }

    public function down()
    {
        $this->db->query("ALTER TABLE games DROP CONSTRAINT games_id_team_foreign;");
        $this->db->query("ALTER TABLE games DROP CONSTRAINT games_id_game_place_type_foreign;");
        $this->db->query("ALTER TABLE games DROP CONSTRAINT games_id_game_championship_type_foreign;");
        
        $this->db->query("ALTER TABLE games DROP INDEX games_id_team_foreign;");
        $this->db->query("ALTER TABLE games DROP INDEX games_id_game_place_type_foreign;");
        $this->db->query("ALTER TABLE games DROP INDEX games_id_game_championship_type_foreign;");

        $this->forge->dropTable('games');
    }
}
