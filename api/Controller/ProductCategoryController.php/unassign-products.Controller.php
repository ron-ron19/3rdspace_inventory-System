<?php

function unassignProductCategory(string $id): void
{
    $result = productCategoriesServiceUnassignProducts($id);

    http_response_code(200);
    header('Content-Type: application/json');

    echo json_encode([
        'message' => 'Products unassigned successfully',
        'data' => $result,
    ]);
}
