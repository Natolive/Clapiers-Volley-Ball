<?php

use CodeIgniter\HTTP\ResponseInterface;

function success_http(ResponseInterface $response, string $message, array|int $data, array $extras = []): ResponseInterface{
    return $response->setStatusCode(200)->setJSON(array_merge(["success" => $message, "data" => $data], $extras));
}

function error_http(ResponseInterface $response, Exception $exception): ResponseInterface {
    $log = [
        "message" => $exception->getMessage(),
        "code" => $exception->getCode(),
        "line" => $exception->getLine(),
        "file" => $exception->getFile(),
        "trace" => $exception->getTraceAsString(),
    ];
    log_message("error", "\nCode: {code}\n Line: {line}\n File: {file}\n Message {message}\n Trace: {trace}", $log);
    return $response->setStatusCode($exception->getCode() === 0 ? 500 : $exception->getCode())->setJSON(["message" => $exception->getMessage()]);
}