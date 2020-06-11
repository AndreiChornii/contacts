<?php
$pdo = new PDO('mysql:host=localhost;dbname=form_php;charset=utf8', 'ijdb_sample', 'mypassword');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$DB = mysqli_connect("localhost", "ijdb_sample", "mypassword", "form_php");