<?php

declare(strict_types=1);

require_once __DIR__ . '/../../config/Connection.php';

// Get the PDO database connection
$pdo = Connection::getConnection();

class InventoryItemCategoryService
{
    public function __construct(
        private PDO $pdo
    ) {}

    public function create(array $data): array
    {
        return create($this->pdo, $data);
    }

    public function list(): array
    {
        return listCategories($this->pdo);
    }

    public function remove(int $id): void
    {
        remove($this->pdo, $id);
    }

    public function getById(int $id): array
    {
        return getById($this->pdo, $id);
    }

    public function update(int $id, array $data): array
    {
        return update($this->pdo, $id, $data);
    }

    public function assignItems(int $id, array $data): array
    {
        return assignItems($this->pdo, $id, $data);
    }

    public function unassignItems(int $id, array $data): array
    {
        return unassignItems($this->pdo, $id, $data);
    }
}

$inventoryItemCategoriesService = new InventoryItemCategoryService($pdo);
