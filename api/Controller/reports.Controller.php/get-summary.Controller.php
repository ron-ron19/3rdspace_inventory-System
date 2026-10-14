<?php

function getSummary(): void
{
    try {
        // Call the reports service
        $result = reportsServiceGetSummary();

        http_response_code(200);

        header('Content-Type: application/json');

        echo json_encode([
            'message' => 'Summary successfully retrieved',
            'data' => $result,
        ]);

    } catch (Throwable $e) {

        http_response_code(500);

        header('Content-Type: application/json');

        echo json_encode([
            'message' => 'Failed to retrieve summary',
            'error' => $e->getMessage(),
        ]);
    }
}