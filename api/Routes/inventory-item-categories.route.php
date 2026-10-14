<?php

require_once '../Controller/InventoryItemCategoryController.php/assign-items.controller.php';
require_once '../controller/InventoryItemCategoryController.php/create.controller.php';
require_once '../controller/InventoryItemCategoryController.php/get-by-id.controller.php';
require_once '../controller/InventoryItemCategoryController.php/index.php';
require_once '../controller/InventoryItemCategoryController.php/list.controller.php';
require_once '../controller/InventoryItemCategoryController.php/remove.controller.php';
require_once '../controller/InventoryItemCategoryController.php/unassign-items.controller.php';
require_once '../controller/InventoryItemCategoryController.php/update.controller.php';


function handleInventoryItemCategoriesRoute(
    string $method,
    string $uri
): void {

    /*
    |--------------------------------------------------------------------------
    | POST /inventory-item-categories/create
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        $uri === '/api/v1/inventory-item-categories/create'
    ) {
        createInventoryItemCategory();
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | POST /inventory-item-categories/:id/assign-items
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        preg_match(
            '#^/api/v1/inventory-item-categories/([^/]+)/assign-items$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        assignItems($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | POST /inventory-item-categories/:id/unassign-items
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        preg_match(
            '#^/api/v1/inventory-item-categories/([^/]+)/unassign-items$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        unassignItems($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | GET /inventory-item-categories/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'GET' &&
        preg_match(
            '#^/api/v1/inventory-item-categories/([^/]+)$#',
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
    | PATCH /inventory-item-categories/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'PATCH' &&
        preg_match(
            '#^/api/v1/inventory-item-categories/([^/]+)$#',
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
    | DELETE /inventory-item-categories/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'DELETE' &&
        preg_match(
            '#^/api/v1/inventory-item-categories/([^/]+)$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        delete($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | GET /inventory-item-categories
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'GET' &&
        $uri === '/api/v1/inventory-item-categories'
    ) {
        listItems();
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
        'message' => 'Inventory item category route not found'
    ]);
}