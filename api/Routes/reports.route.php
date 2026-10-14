
<?php

require_once __DIR__ . '/../Controller/reports.Controller.php/get-summary.Controller.php';


function handleReportsRoute(
    string $method,
    string $uri
): void {

    /*
    |--------------------------------------------------------------------------
    | GET /reports
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'GET' &&
        $uri === '/api/v1/reports'
    ) {
        get-summary();
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Route Not Found
    |--------------------------------------------------------------------------
    */

    http_response_code(404);
    header('Content-Type: application/json');

    echo json_encode([
        'message' => 'Reports route not found'
    ]);
}

