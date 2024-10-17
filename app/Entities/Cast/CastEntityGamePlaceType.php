<?php

namespace App\Entities\Cast;

use App\Models\GamesPlacesTypesModel;
use CodeIgniter\Entity\Cast\BaseCast;

class CastEntityGamePlaceType extends BaseCast
{
    public static function get($value, array $params = [])
    {
        $gamePlaceType = (new GamesPlacesTypesModel())->find($value);
        return $gamePlaceType;
    }

    public static function set($value, array $params = [])
    {
        return $value;
    }
}