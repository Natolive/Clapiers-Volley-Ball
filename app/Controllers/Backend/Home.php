<?php

namespace App\Controllers\Backend;

class Home extends BaseController
{
    public function index(): string
    {
        return view('backend/home');
    }
}
