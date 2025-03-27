<?php
declare(strict_types=1);

namespace Core;

use PDO;

abstract class AbstractModel extends DataObject
{
    /**
     * @var DbConnector|null
     */
    private ?DbConnector $db = null;

    /**
     * DataObject constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (!$this->db) {
            $this->db = new DbConnector();
        }
    }

    /**
     * Establishes a connection to the MySQL database using PDO.
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->db->getConnection();
    }
}
