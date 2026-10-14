
<?php

require_once '../controller/productCategoryController.php/assign-products.controller.php';
require_once '../controller/productCategoryController.php/create.controller.php';
require_once '../controller/productCategoryController.php/get-by-id.controller.php';
require_once '../controller/productCategoryController.php/index.php';
require_once '../controller/productCategoryController.php/list.controller.php';
require_once '../controller/productCategoryController.php/remove.controller.php';
require_once '../controller/productCategoryController.php/unassign-products.controller.php';
require_once '../controller/productCategoryController.php/update.controller.php';


function handleProductCategoriesRoute(
    string $method,
    string $uri
): void {

    /*
    |--------------------------------------------------------------------------
    | POST /product-categories/create
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        $uri === '/api/v1/product-categories/create'
    ) {
        createProductCategory();
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | POST /product-categories/:id/assign-items
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        preg_match(
            '#^/api/v1/product-categories/([^/]+)/assign-items$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        assignProducts($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | POST /product-categories/:id/unassign-items
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'POST' &&
        preg_match(
            '#^/api/v1/product-categories/([^/]+)/unassign-items$#',
            $uri,
            $matches
        )
    ) {
        $id = $matches[1];

        unassignProducts($id);
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | PATCH /product-categories/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'PATCH' &&
        preg_match(
            '#^/api/v1/product-categories/([^/]+)$#',
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
    | DELETE /product-categories/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'DELETE' &&
        preg_match(
            '#^/api/v1/product-categories/([^/]+)$#',
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
    | GET /product-categories/:id
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'GET' &&
        preg_match(
            '#^/api/v1/product-categories/([^/]+)$#',
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
    | GET /product-categories
    |--------------------------------------------------------------------------
    */

    if (
        $method === 'GET' &&
        $uri === '/api/v1/product-categories'
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
        'message' => 'Product category route not found'
    ]);
}
