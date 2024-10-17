<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class EntityGamePlaceType extends Entity
{
    protected $datamap = [];
    protected $dates   = [];
    protected $casts   = [
        'id' => 'int',
        'place' => 'string',
        'description' => 'string'
    ];
}
