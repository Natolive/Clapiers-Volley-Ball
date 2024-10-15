<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;

class ControllerPublicRankings extends BaseController
{
    public function index(): string
    {
        return public_build(view("public/rankings"));
    }
}
