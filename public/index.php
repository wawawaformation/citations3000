<?php

use App\Models\Entity\AuthorsEntity;

/**
 * Entrée de notre application
 */

define('ROOT', dirname(__DIR__));

require_once ROOT . '/vendor/autoload.php';

$david = new AuthorsEntity([
    'id'=>12,
    'author'=>'David LEGRAND',
    'birthday'=>'1975-09-07',
]);
dump($david);


