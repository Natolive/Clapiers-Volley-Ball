<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class ControllerBackendDashboard extends BaseController
{
    public function index(): string
    {
        helper("html");

        return backend_build(view('backend/dashboard'), "Dashboard");
    }
}
