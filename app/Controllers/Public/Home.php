<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        return public_build(view("public/home"));
    }
}
