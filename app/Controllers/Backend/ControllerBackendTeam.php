<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\EntityTeam;
use App\Models\TeamsModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use \Exception;

class ControllerBackendTeam extends BaseController
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
     * @return EntityTeam
     */
    protected function getTeam(int $idTeam): EntityTeam {
        $team = (new TeamsModel())->find($idTeam);
        if (!$team) {
            throw new Exception("Error get team", 404);
        }
        return $team;
    }

    protected function addTeam(string $name, string $division, ?string $description, ?UploadedFile $image): EntityTeam {
        $team = new EntityTeam();
        $team->name = $name;
        $team->division = $division;
        $team->description = $description;
        
        if ($image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $guidv4 = guidv4();
                $extension = $image->getExtension();
                $image->move(WRITEPATH . 'uploads', $guidv4 . "." . $extension);
                $team->image_uuid = $guidv4;
                $team->image_extension = $extension;
            }
        }

        $idTeam = (new TeamsModel)->insert($team);
        if (!$idTeam) {
            throw new Exception("Error inserting team", 400);
        }
        $team->id = $idTeam;
        return $team;
    }

    protected function deleteTeam(int $idTeam): int 
    {
        $team = $this->getTeam($idTeam);
        
        if (!(new TeamsModel())->delete($idTeam)) {
            throw new Exception("Error deleting team", 400);
        }
            
        if ($team->image_uuid) {
            $path = WRITEPATH . "uploads/" . $team->image_uuid . "." . $team->image_extension;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return $idTeam;
    }
}
