<?php

use CodeIgniter\HTTP\ResponseInterface;
use \Exception;

function success_http(ResponseInterface $response, string $message, array $data, array $extras = []): ResponseInterface{
    return $response->setStatusCode(200)->setJSON(array_merge(["success" => $message, "data" => $data], $extras));
}

function error_http(ResponseInterface $response, Exception $exception): ResponseInterface {
    return $response->setStatusCode($exception->getCode() === 0 ? 500 : $exception->getCode())->setJSON(["message" => $exception->getMessage()]);
}