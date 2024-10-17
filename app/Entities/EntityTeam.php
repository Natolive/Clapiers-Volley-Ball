<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class EntityTeam extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id' => 'int',
        'name' => 'string',
        'description' => '?string',
        'division' => 'string',
        'image_uuid' => '?string',
        'image_extension' => '?string',
        'created_at' => '?datetime',
        'updated_at' => '?datetime',
    ];
}
