<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        return view('public/home');
    }
}
