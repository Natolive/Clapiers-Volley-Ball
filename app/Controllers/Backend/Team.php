<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Team extends BaseController
{
    public function index(): string
    {
        helper("html");

        return backend_build(view('backend/team'), "Équipes");
    }
}
