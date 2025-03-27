<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Models\CreateUserTableMigration;

$migrationCreateUsersTable = new CreateUserTableMigration();
$migrationCreateUsersTable->execute();
