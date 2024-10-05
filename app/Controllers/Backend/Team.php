<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\Teams;
use App\Models\TeamsModel;
use \Exception;

class Team extends BaseController
{
    /**
     * Get view of page backend team
     * @return string
     */
    public function index(): string
    {
        helper("html");

        return backend_build(view('backend/team'), "Équipes");
    }

    /**
     * Get all teams
     * @return array
     */
    protected function getAllTeams(): array {
        return (new TeamsModel)->findAll();
    }

    /**
     * Get team
     * @param int $idTeam
     * @throws Exception
     * @return array|Teams
     */
    protected function getTeam(int $idTeam): ?Teams {
        $team = (new TeamsModel())->find($idTeam);
        if (!$team) {
            throw new Exception("Error get team", 404);
        }
        return $team;
    }
}
