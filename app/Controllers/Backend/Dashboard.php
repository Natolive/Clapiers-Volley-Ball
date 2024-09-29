<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('backend/dashboard');
    }
}
