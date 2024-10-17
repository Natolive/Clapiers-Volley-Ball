<?php

namespace App\Controllers\Backend\Http;

use App\Controllers\Backend\ControllerBackendCalendar;
use App\Controllers\Backend\ControllerBackendTeam;
use App\Controllers\Backend\Http\HttpInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class HttpGame extends ControllerBackendCalendar implements HttpInterface
{

    /**
     * @inheritDoc
     */
    public function getAll(): ResponseInterface {
        try {
            $games = $this->getAllGames();
            
            return success_http($this->response, "games get all", $games); 
        } catch (Exception $exception) {
            return error_http($this->response, $exception);
        }
    }

    /**
     * @inheritDoc
     */
    public function add(): ResponseInterface {
        try {
            $rules = [
                "id_team" => "required|integer",
                "opposite_team" => "required|min_length[1]|max_length[255]",
                "id_game_place_type" => "required|integer",
                "id_game_championship_type" => "required|integer",
                "date" => "required|valid_date[d/m/Y]"
            ];
            security_rules($this->request, $rules);

            $post = $this->request->getPost(["id_team", "opposite_team", "id_game_place_type", "id_game_championship_type", "date"]);

            $game = $this->addGame($post["id_team"], $post["opposite_team"], $post["id_game_place_type"], $post["id_game_championship_type"], $post["date"]);

            return success_http($this->response, "team add", $game->toArray());
        } catch (Exception $exception) {
            return error_http($this->response, $exception);
        }
    }
    
    /**
     * @inheritDoc
     */
    public function delete(int $id): ResponseInterface {
    }
    
    /**
     * @inheritDoc
     */
    public function get(int $id): ResponseInterface {
    }
    
    
    /**
     * @inheritDoc
     */
    public function update(int $id): ResponseInterface {
    }
}