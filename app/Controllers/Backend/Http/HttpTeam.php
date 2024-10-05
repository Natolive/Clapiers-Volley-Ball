<?php

namespace App\Controllers\Backend\Http;

use App\Controllers\Backend\Team;
use App\Controllers\Backend\Http\HttpInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class HttpTeam extends Team implements HttpInterface
{

    public function getAll(): ResponseInterface {
        try {
            $teams = $this->getAllTeams();
            
            return success_http($this->response, "teams get all", $teams); 
        } catch (Exception $exception) {
            return error_http($this->response, $exception);
        }
    }

    public function get(int $id): ResponseInterface {
        try {
            $team = $this->getTeam($id);

            return success_http($this->response, "team get", $team);
        } catch (Exception $exception) {
            return error_http($this->response, $exception);
        }
    }

    public function add(): ResponseInterface {
        try {
            $team = [];

            return $this->response->setJSON(["success" => "team add", "data" => $team]);
        } catch (Exception $e) {
            return $this->response->setStatusCode(400)->setJSON(["error" => $e->getMessage()]);
        }
    }

    public function update(int $id): ResponseInterface {
        try {
            $team = [];

            return $this->response->setJSON(["success" => "team update", "data" => $team]);
        } catch (Exception $e) {
            return $this->response->setStatusCode(400)->setJSON(["error" => $e->getMessage()]);
        }
    }

    public function delete(int $id): ResponseInterface {
        try {
            $team = [];

            return $this->response->setJSON(["success" => "team delete", "data" => $team]);
        } catch (Exception $e) {
            return $this->response->setStatusCode(400)->setJSON(["error" => $e->getMessage()]);
        }
    }
}