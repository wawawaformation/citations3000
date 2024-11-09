<?php

/**
 * Entrée de notre application
 */

use App\Core\Database\Db;
use App\Models\Manager\AuthorsManager;

define('ROOT', dirname(__DIR__));

require_once ROOT . '/vendor/autoload.php';

$manager = new AuthorsManager(Db::getInstance());
dd($manager->findAll());
