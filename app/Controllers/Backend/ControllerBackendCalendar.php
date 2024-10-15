<?php

namespace App\Controllers\Backend;

use CodeIgniter\Shield\Models\LoginModel;
use App\Controllers\BaseController;

class ControllerBackendCalendar extends BaseController
{
    public function index(): string
    {
        return backend_build(view('backend/calendar'), "Calendrier");
    }
}
