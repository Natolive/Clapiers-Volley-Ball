<?php

namespace App\Controllers\Backend;

use CodeIgniter\Shield\Models\LoginModel;
use App\Controllers\BaseController;

class Activity extends BaseController
{
    public function index(): string
    {
        $logins = $this->get_activity();

        $headers = ["Date", "Identifiant", "Adresse ip", "Navigateur", "Réussite"];
        $indexes = ["date", "identifier", "ip_address", "user_agent", "success",];
        $data = ["headers" => $headers, "entries" => $logins, "indexes" => $indexes];

        return backend_build(view('backend/activity', $data), "Activités");
    }

    private function get_activity(): array {
        $logins = (new LoginModel())->orderBy("date")->findAll();
        return $logins;
    }
}
