<?php
declare(strict_types=1);

namespace Core;

use PDO;

interface ConnectorInterface
{
    /**
     * Establishes a connection to the MySQL database using PDO.
     *
     * This method attempts to create a PDO instance to interact with the database.
     * If successful, it returns the PDO object.
     * If an error occurs during the connection process, an exception is thrown
     * and the error message is displayed.
     *
     * @return PDO
     */
    public function getConnection(): PDO;
}
