<?php

use App\Models\Entity\AuthorsEntity;
use App\Models\Manager\AuthorsManager;
use App\Core\Database\Db;

/**
 * Entrée de notre application
 */

define('ROOT', dirname(__DIR__));

require_once ROOT . '/vendor/autoload.php';

$authorsManager = new AuthorsManager(Db::getInstance());
dump($authorsManager->findOne(2));

