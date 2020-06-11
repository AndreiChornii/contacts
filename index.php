<?php
//echo 'hello_world';
session_start();
include __DIR__ . '/includes/DatabaseConnection.php';
include __DIR__ . '/handlers/dump.php';
include __DIR__ . '/handlers/mysqli.php';
include __DIR__ . '/handlers/validate.php';

$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

//echo '<BR />';
//var_dump($_SERVER);
echo '<BR />';
echo $route;
echo '<BR />';
echo $method;

//include __DIR__ . '/handlers/routesMethodGet.php';
//
//include __DIR__ . '/handlers/routesMethodPost.php';