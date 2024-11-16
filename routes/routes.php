<?php

/**
 * Listes de routes
 */

 $routeur->map('GET', '/', function(){
    echo 'default';
 }, 'default');


 //Authors
 $routeur->map('GET', '/authors', function(){
    echo 'list';
 }, 'authors_list');

 $routeur->map('GET', '/authors/[i:id]', function($id){
    echo 'one ' . $id;
 }, 'authors_read');

 $routeur->map('GET|POST', '/authors/add', function(){
    echo 'create';
 }, 'authors_create');

 $routeur->map('GET', '/authors/delete/[i:id]', function($id){
    echo 'delete';
 }, 'authors_delete');

 $routeur->map('GET|POST', '/authors/update/[i:id]', function($id){
    echo 'update';
 }, 'authors_update');

 //Quotes

 //Users

 //Auth

 //json