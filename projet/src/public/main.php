<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
use App\Core\Router;

$route = new Router();
$route->dispatcher();