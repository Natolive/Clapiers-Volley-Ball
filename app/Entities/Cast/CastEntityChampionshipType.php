<?php

namespace App\Entities\Cast;

use App\Models\GamesChampionshipsTypesModel;
use CodeIgniter\Entity\Cast\BaseCast;

class CastEntityChampionshipType extends BaseCast
{
    public static function get($value, array $params = [])
    {
        $gameChampionshipType = (new GamesChampionshipsTypesModel())->find($value);
        return $gameChampionshipType;
    }

    public static function set($value, array $params = [])
    {
        return $value;
    }
}