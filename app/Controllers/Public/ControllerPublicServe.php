<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ControllerPublicServe extends BaseController
{

    public function get(string $name): ResponseInterface
    {
        $filePath = WRITEPATH . 'uploads/' . $name;

        if (!file_exists($filePath)) {
            return $this->response->setStatusCode(404, 'File Not Found');
        }

        $mime = mime_content_type($filePath);

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setBody(file_get_contents($filePath));
    }

}