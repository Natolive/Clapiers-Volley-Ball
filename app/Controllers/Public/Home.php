<?php

namespace App\Controllers\Public;

class Home extends BaseController
{
    public function index(): string
    {
        return view('public/home');
    }
}
