<?php

namespace App\Controllers\Backend;

use App\Models\GamesModel;
use CodeIgniter\Shield\Models\LoginModel;
use App\Controllers\BaseController;

class ControllerBackendCalendar extends BaseController
{
    public function index(): string
    {

        d((new GamesModel())->find(1)->id_game_place_type);

        return backend_build(view('backend/calendar'), "Calendrier");
    }
}
