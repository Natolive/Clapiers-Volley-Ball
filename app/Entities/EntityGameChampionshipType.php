<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class EntityGameChampionshipType extends Entity
{
    protected $datamap = [];
    protected $dates   = [];
    protected $casts   = [
        'id' => 'int',
        'name' => 'string',
        'description' => 'string'
    ];
}
