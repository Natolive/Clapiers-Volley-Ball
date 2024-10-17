<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumNameToTableGamePlaceType extends Migration
{
    public function up()
    {
        $fields = [
            "name" => [
                "type" => "VARCHAR",
                'constraint' => "255",
                "null" => false,
                "after" => "id"
            ]
        ];
        $this->forge->addColumn("games_places_types", $fields);
    }

    public function down()
    {
        $this->forge->dropColumn("games_places_types","name");
    }
}
