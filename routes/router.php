<?php
/**
 * Instanciation du routeur et direction vers le bon controller
 */

 $routeur = new AltoRouter();
 require_once __DIR__ . '/routes.php';
$match = $routeur->match();


// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
    echo 'Pas de match';
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}