<?php
$request_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$requested_file = __DIR__ . DIRECTORY_SEPARATOR . ltrim($request_path, '/');

if ($request_path !== '/' && is_file($requested_file)) {
    return false;
}

require __DIR__ . DIRECTORY_SEPARATOR . 'index.php';