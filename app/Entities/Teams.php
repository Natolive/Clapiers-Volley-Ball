<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Teams extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
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
