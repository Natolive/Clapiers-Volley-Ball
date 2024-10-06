<?php

namespace App\Controllers\Backend\Http;

use App\Controllers\Backend\ControllerBackendTeam;
use App\Controllers\Backend\Http\HttpInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class HttpTeam extends ControllerBackendTeam implements HttpInterface
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

            return success_http($this->response, "team get", $team->toArray());
        } catch (Exception $exception) {
            return error_http($this->response, $exception);
        }
    }

    public function add(): ResponseInterface {
        try {
            $rules = [
                "name" => "required|min_length[1]|max_length[100]",
                "division" => "required|min_length[1]|max_length[100]",
                "description" => "permit_empty|min_length[1]|max_length[200]",
                "image" => "permit_empty|uploaded[image]|is_image[image]|max_size[image,2000]"
            ];
            security_rules($this->request, $rules);

            $post = $this->request->getPost(["name", "division", "description"]);
            $image = $this->request->getFile("image");

            $team = $this->addTeam($post["name"], $post["division"], $post["description"], $image);

            return success_http($this->response, "team get", $team->toArray());
        } catch (Exception $exception) {
            return error_http($this->response, $exception);
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
            $idTeam = $this->deleteTeam($id);

            return $this->response->setJSON(["success" => "team delete", "data" => $idTeam]);
        } catch (Exception $e) {
            return $this->response->setStatusCode(400)->setJSON(["error" => $e->getMessage()]);
        }
    }
}