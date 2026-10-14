<?php

declare(strict_types=1);

class Database
{
    private?PDO $connection = null;

    public function connect(array $config): PDO
    {
        $host = $config['host'];
        $dbName = $config['db_name'];
        $username = $config['db_user'];
        $password = $config['db_pass'];

        $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8mb4";

        $this->connection = new PDO(
            $dsn,
            $username,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

        return $this->connection;
    }

    public function getConnection(): PDO
    {
        if ($this->connection === null) {
            throw new RuntimeException(
                'Database connection has not been initialized.'
            );
        }

        return $this->connection;
    }
}
