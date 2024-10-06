<?php 

namespace App\Controllers\Backend\Http;

use App\Controllers\Backend\ControllerBackendServe;
use CodeIgniter\HTTP\ResponseInterface;

class HttpServe extends ControllerBackendServe
{
    public function get(string $name): ResponseInterface {
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