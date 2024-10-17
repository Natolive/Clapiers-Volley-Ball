<?php

namespace App\Entities\Cast;

use App\Models\TeamsModel;
use CodeIgniter\Entity\Cast\BaseCast;

class CastEntityTeam extends BaseCast
{
    public static function get($value, array $params = [])
    {
        $team = (new TeamsModel())->find($value);
        return $team;
    }

    public static function set($value, array $params = [])
    {
        return $value;
    }
}