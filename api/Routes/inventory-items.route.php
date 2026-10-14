<?php

require_once __DIR__ . '/../Controller/InventoryItemController.php/create.controller.php';
require_once __DIR__ . '/../Controller/InventoryItemController.php/get-by-id.controller.php';
require_once __DIR__ . '/../Controller/InventoryItemController.php/index.php';
require_once __DIR__ . '/../Controller/InventoryItemController.php/list.controller.php';
require_once __DIR__ . '/../Controller/InventoryItemController.php/remove.controller.php';
require_once __DIR__ . '/../Controller/InventoryItemController.php/stock-in.controller.php';
require_once __DIR__ . '/../Controller/InventoryItemController.php/stock-out.controller.php';
require_once __DIR__ . '/../Controller/InventoryItemController.php/update.controller.php';

function handleInventoryItemsRoute(
    string $method,
    string $uri
): void {

    /*
    |--------------------------------------------------------------------------
    | GET /inventory-items
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'GET' &&
        $uri === '/api/v1/inventory-items'
    ) {
        listItems();
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | POST /inventory-items/create
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        $uri === '/api/v1/inventory-items/create'
    ) {
        create();
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | PATCH /inventory-items/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'PATCH' &&
        preg_match(
            '#^/api/v1/inventory-items/([^/]+)$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        update($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE /inventory-items/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'DELETE' &&
        preg_match(
            '#^/api/v1/inventory-items/([^/]+)$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        // Same as requireRole("ADMIN", "MANAGER")
        // Add your role validation here.

        delete($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | GET /inventory-items/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'GET' &&
        preg_match(
            '#^/api/v1/inventory-items/([^/]+)$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        getById($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | POST /inventory-items/:id/stock-in
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        preg_match(
            '#^/api/v1/inventory-items/([^/]+)/stock-in$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        stockIn($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | POST /inventory-items/:id/stock-out
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        preg_match(
            '#^/api/v1/inventory-items/([^/]+)/stock-out$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        stockOut($id);
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
        'message' => 'Inventory item route not found'
    ]);
}

