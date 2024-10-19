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

    protected function getAllGames(?string $start, ?string $end): array {
        $gamesModel = new GamesModel();
        if ($start && $end) {
            $gamesModel->where('date >=', $start)->where('date <=', $end);
        }
        return $gamesModel->findAll();
    }

    protected function addGame(int $idTeam, string $oppositeTeam, int $idGamePlaceType, int $idGameChampionshipType, string $date): EntityGame {
        $game = new EntityGame();
        $game->id_team = $idTeam;
        $game->opposite_team = $oppositeTeam;
        $game->id_game_place_type = $idGamePlaceType;
        $game->id_game_championship_type = $idGameChampionshipType;
        $game->date = DateTime::createFromFormat("d/m/Y", $date);

        $idGame = (new GamesModel())->insert($game);
        if (!$idGame) {
            throw new Exception("Error inserting game", 400);
        }
        $game->id = $idGame;
        return $game;
    }

    protected function getGame(int $idGame): EntityGame {
        $game = (new GamesModel())->find($idGame);
        if (!$game) {
            throw new Exception("Error get game", 404);
        }
        return $game;
    }

    protected function updateGame(int $idGame, int $idTeam, string $oppositeTeam, int $idGamePlaceType, int $idGameChampionshipType, string $date): EntityGame
    {
        $game = new EntityGame();
        $game->id_team = $idTeam;
        $game->opposite_team = $oppositeTeam;
        $game->id_game_place_type = $idGamePlaceType;
        $game->id_game_championship_type = $idGameChampionshipType;
        $game->date = DateTime::createFromFormat("d/m/Y", $date);

        if(!(new GamesModel())->update($idGame, $game)) {
            throw new Exception("Error updating game", 400);
        };
        $game->id = $idGame;
        return $game;
    }
}
