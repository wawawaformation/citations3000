<?php

use App\Controllers\AuthorsController;

/**
 * Listes de routes
 */

 $routeur->map('GET', '/', function(){
    echo 'default';
 }, 'default');


 //Authors
 $routeur->map('GET', '/authors', function(){
   (new AuthorsController())->all();

    
 }, 'authors_list');

 $routeur->map('GET', '/authors/[i:id]', function($id){
    echo 'one ' . $id;
 }, 'authors_read');

 $routeur->map('GET|POST', '/authors/add', function(){
    echo 'create';
 }, 'authors_create');

 $routeur->map('GET', '/authors/delete/[i:id]', function($id){
   (new AuthorsController())->delete($id);
 }, 'authors_delete');

 $routeur->map('GET|POST', '/authors/update/[i:id]', function($id){
    echo 'update';
 }, 'authors_update');

 //Quotes

 //Users

 //Auth

 //json