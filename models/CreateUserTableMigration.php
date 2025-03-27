<?php
declare(strict_types=1);

namespace Models;

use Core;

/**
 * Migration class to create the users table.
 */
class CreateUserTableMigration extends Core\DbConnector
{
    public function execute(): void
    {
        $conn = $this->getConnection();
        $tableScript = "
            CREATE TABLE IF NOT EXISTS `users` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `firstname` VARCHAR(100) NOT NULL,
                `lastname` VARCHAR(100) NOT NULL,
                `email` VARCHAR(100) NOT NULL UNIQUE,
                `phone` VARCHAR(15) NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";
        try {
            $conn->exec($tableScript);
        } catch (\PDOException $e) {
            // TODO: add logger
            echo "Error: " . $e->getMessage();
        }
    }
}
