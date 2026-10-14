<?php

function getByIdProduct(string $id): void
{
    $result = productsServiceGetById($id);

    http_response_code(200);

    header('Content-Type: application/json');

    echo json_encode([
        'message' => 'success',
        'data' => $result,
    ]);
}
