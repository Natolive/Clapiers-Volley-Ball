<?php

use CodeIgniter\HTTP\ResponseInterface;
use \Exception;

function success_http(ResponseInterface $response, string $message, array $data): ResponseInterface{
    return $response->setStatusCode(200)->setJSON(["success" => $message, "data" => $data]);
}

function error_http(ResponseInterface $response, Exception $exception): ResponseInterface {
    return $response->setStatusCode($exception->getCode() ? 500 : $exception->getCode())->setJSON(["error" => $exception->getMessage()]);
}