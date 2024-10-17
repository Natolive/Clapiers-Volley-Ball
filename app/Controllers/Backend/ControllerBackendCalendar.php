<?php

namespace App\Controllers\Backend;

use App\Models\GamesChampionshipsTypesModel;
use App\Models\GamesModel;
use App\Controllers\BaseController;
use App\Entities\EntityGame;
use App\Models\GamesPlacesTypesModel;
use \Exception;
use \DateTime;

class ControllerBackendCalendar extends BaseController
{
    public function index(): string
    {
        $gamesChampionshipsTypes = (new GamesChampionshipsTypesModel())->findAll();
        $gamesPlacesTypes = (new GamesPlacesTypesModel())->findAll();
        return backend_build(view('backend/calendar', [
            "gamesPlacesTypes" => $gamesPlacesTypes,
            "gamesChampionshipsTypes" => $gamesChampionshipsTypes
        ]), "Calendrier");
    }

    protected function getAllGames(): array {
        return (new GamesModel)->findAll();
    }

    protected function addGame(int $idTeam, string $oppositeTeam, int $idGamePlaceType, int $idGameChampionshipType, string $date): EntityGame {
        $game = new EntityGame();
        $game->id_team = $idTeam;
        $game->opposite_team = $oppositeTeam;
        $game->id_game_place_type = $idGamePlaceType;
        $game->id_game_championship_type = $idGameChampionshipType;
        $game->date = DateTime::createFromFormat("d/m/Y", $date);

        if (!(new GamesModel())->save($game)) {
            throw new Exception("Error inserting game", 400);
        }
        return $game;
    }
}
