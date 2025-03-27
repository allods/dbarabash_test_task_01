<?php
declare(strict_types=1);

namespace Core;

require_once __DIR__ . '/../config/db_config.php';

use PDO;
use PDOException;

class DbConnector implements ConnectorInterface
{
    private string $host = DB_SERVER;
    private string $db_name = DB_DATABASE;
    private string $username = DB_USERNAME;
    private string $password = DB_PASSWORD;

    /**
     * {@inheritdoc}
     */
    public function getConnection(): PDO
    {
        try {
            // Data source name
            $dsn = "mysql:host={$this->host};dbname={$this->db_name}";
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // TODO: add logger + propper handling of an error
            echo "Connection failed: " . $e->getMessage();
            exit;
        }

        return $conn;
    }
}
