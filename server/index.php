<?php
session_start();
include './includes/DatabaseConnection.php';
include './handlers/dump.php';
include './handlers/mysqli.php';
include './handlers/validate.php';

$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

echo $route;
echo '<BR />';
echo $method;

include './handlers/routesMethodGet.php';

include './handlers/routesMethodPost.php';