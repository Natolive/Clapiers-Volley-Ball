<?php
use CodeIgniter\HTTP\IncomingRequest;

function security_rules(IncomingRequest $request, array $rules) {
    $validation = \Config\Services::validation();
    $validation->setRules($rules);

    if (!$validation->withRequest($request)->run()) {
        $errors = $validation->getErrors();
        throw new Exception("Error " . reset($errors), 400);
    }
}