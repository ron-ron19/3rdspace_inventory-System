<?php

require_once __DIR__ . '/../Controller/ProductController.php/create.controller.php';
require_once __DIR__ . '/../Controller/ProductController.php/get-by-id.controller.php';
require_once __DIR__ . '/../Controller/ProductController.php/deduct-stock-for-product.controller.php';
require_once __DIR__ . '/../Controller/ProductController.php/list.controller.php';
require_once __DIR__ . '/../Controller/ProductController.php/remove.controller.php';
require_once __DIR__ . '/../Controller/ProductController.php/update.controller.php';


function handleProductsRoute(
    string $method,
    string $uri
): void {

    // POST /api/v1/products/create
    if (
        $method === 'POST' &&
        $uri === '/api/v1/products/create'
    ) {
        createProduct();
        return;
    }


    // POST /api/v1/products/:id/deduct-stock
    if (
        $method === 'POST' &&
        preg_match(
            '#^/api/v1/products/([^/]+)/deduct-stock$#',
            $uri,
            $matches
        )
    ) {
        deductStockForProduct($matches[1]);
        return;
    }


    // GET /api/v1/products/:id
    if (
        $method === 'GET' &&
        preg_match(
            '#^/api/v1/products/([^/]+)$#',
            $uri,
            $matches
        )
    ) {
        getProductById($matches[1]);
        return;
    }


    // DELETE /api/v1/products/:id
    if (
        $method === 'DELETE' &&
        preg_match(
            '#^/api/v1/products/([^/]+)$#',
            $uri,
            $matches
        )
    ) {
        removeProduct($matches[1]);
        return;
    }


    // PATCH /api/v1/products/:id
    if (
        $method === 'PATCH' &&
        preg_match(
            '#^/api/v1/products/([^/]+)$#',
            $uri,
            $matches
        )
    ) {
        updateProduct($matches[1]);
        return;
    }


    // GET /api/v1/products
    if (
        $method === 'GET' &&
        $uri === '/api/v1/products'
    ) {
        listProducts();
        return;
    }


    // Route not found
    http_response_code(404);
    header('Content-Type: application/json');

    echo json_encode([
        'message' => 'Product route not found'
    ]);
}