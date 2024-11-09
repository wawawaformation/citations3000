<?php

/**
 * Entrée de notre application
 */

use App\Models\Manager\AuthorsManager;

define('ROOT', dirname(__DIR__));

require_once ROOT . '/vendor/autoload.php';

$manager = new AuthorsManager();
$authors = $manager->findAll();
dd($authors);