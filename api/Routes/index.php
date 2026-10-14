
<?php

require_once __DIR__ . '/auth.route.php';
require_once __DIR__ . '/users.route.php';
require_once __DIR__ . '/inventory-items.route.php';
require_once __DIR__ . '/products.route.php';
require_once __DIR__ . '/inventory-item-categories.route.php';
require_once __DIR__ . '/product-categories.route.php';
require_once __DIR__ . '/reports.route.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/

if (str_starts_with($uri, '/api/v1/auth')) {
    handleAuthRoute($method, $uri);
    exit;
}

if (str_starts_with($uri, '/api/v1/users')) {
    handleUsersRoute($method, $uri);
    exit;
}

if (str_starts_with($uri, '/api/v1/inventory-items')) {
    handleInventoryItemsRoute($method, $uri);
    exit;
}

if (str_starts_with($uri, '/api/v1/products')) {
    handleProductsRoute($method, $uri);
    exit;
}

if (str_starts_with($uri, '/api/v1/inventory-item-categories')) {
    handleInventoryItemCategoriesRoute($method, $uri);
    exit;
}

if (str_starts_with($uri, '/api/v1/product-categories')) {
    handleProductCategoriesRoute($method, $uri);
    exit;
}

if (str_starts_with($uri, '/api/v1/reports')) {
    handleReportsRoute($method, $uri);
    exit;
}

/*
|--------------------------------------------------------------------------
| Route Not Found
|--------------------------------------------------------------------------
*/

http_response_code(404);
header('Content-Type: application/json');

echo json_encode([
    'message' => 'Route not found'
]);
