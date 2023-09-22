<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

return function ($event) {
    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            // Handle GET request
            return handleGET($event);
            break;
        case 'POST':
            // Handle POST request
            return handlePOST($event);
            break;
        case 'PUT':
            // Handle PUT request
            return handlePUT($event);
            break;
        case 'DELETE':
            // Handle DELETE request
            return handleDELETE($event);
            break;
        default:
            return 'Unsupported method';
            break;
    }
};

function handleGET($event) {
    return 'GET Request: Hello ' . ($event['name'] ?? 'world');
}

function handlePOST($event) {
    // Access POST data
    $postData = json_decode($event['body'], true);

    return 'POST Request: Hello ' . ($postData['name'] ?? 'world');
}

function handlePUT($event) {
    // Access PUT data
    $putData = json_decode($event['body'], true);

    return 'PUT Request: Hello ' . ($putData['name'] ?? 'world');
}

function handleDELETE($event) {
    return 'DELETE Request: Goodbye ' . ($event['name'] ?? 'world');
}
