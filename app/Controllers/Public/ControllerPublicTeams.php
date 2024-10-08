<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\TeamsModel;

class ControllerPublicTeams extends BaseController
{
    public function index(): string
    {
        $teams = $this->getAllTeams();
        return public_build(view("public/teams", ["teams" => $teams]));
    }

    private function getAllTeams(): array {
        $teams = (new TeamsModel())->findAll();
        return $teams;
    }
}