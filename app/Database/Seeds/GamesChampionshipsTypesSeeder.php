<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GamesChampionshipsTypesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Championnat',
                'description' => "Matchs joués pour le championnat"
            ],
            [
                'name' => "Coupe de l'Hérault",
                'description' => "Matchs joués pour la coupe de l'Hérault"
            ],
        ];

        $this->db->table('games_championships_types')->insertBatch($data);
    }
}
