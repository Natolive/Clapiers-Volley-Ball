<?php

namespace App\Controllers\Backend\Http;

use CodeIgniter\HTTP\ResponseInterface;

interface HttpInterface {
    public function getAll(): ResponseInterface;
    public function get(int $id): ResponseInterface;
    public function add(): ResponseInterface;
    public function update(int $id): ResponseInterface;
    public function delete(int $id): ResponseInterface;
}