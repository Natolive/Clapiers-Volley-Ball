<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class EntityGame extends Entity
{
    protected $datamap = [];
    protected $dates   = ['date', 'created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'int',
        'date' => 'datetime',
        'opposite_team' => 'string',
        'id_team' => 'entity_team',
        'id_game_place_type' => 'entity_game_place_type' ,
        'id_game_championship_type' => 'int' ,
        'created_at' => '?datetime',
        'updated_at' => '?datetime',
    ];

    protected $castHandlers = [
        'entity_team' => Cast\CastEntityTeam::class,
        'entity_game_place_type' => Cast\CastEntityGamePlaceType::class
    ];
}
