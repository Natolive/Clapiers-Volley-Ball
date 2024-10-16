<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GamesPlacesTypesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'place' => 'Domicile',
                'description' => 'Matchs joués à domicile'
            ],
            [
                'place' => 'Extérieur',
                'description' => 'Matchs joués à l’extérieur'
            ]
        ];

        $this->db->table('games_places_types')->insertBatch($data);
    }
}
