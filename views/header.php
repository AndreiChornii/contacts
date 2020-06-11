<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/style.css">
    <title>contacts</title>
</head>

<body>
    <header class="header">
        <nav>
            <ul class="header__menu">
                <?php if(!empty($currentUser['username'])){?>
                <li><a class="header__link<?php if($route === '/') {echo ' active';} ?>" href="/">Contacts</a></li>
                <?php } ?>
                <?php if(!empty($currentUser['username'])){ ?>
                <!--<li><a class="header__link" href="/email">Email</a></li>-->
                <?php } ?>
                <li><a class="header__link<?php if($route === '/login') {echo ' active';} ?>" href="/login">Login</a></li>
                <?php if($isAdmin) { ?>
                <li><a class="header__link<?php if($route === '/users') {echo ' active';} ?>" href="/users">Users</a></li>
                <?php } ?>
                <li><a class="header__link<?php if($route === '/registration') {echo ' active';} ?>" href="/registration">Registration</a></li>
                <?php if(!empty($currentUser['username'])){ ?>
                <li><a class="header__link<?php if($route === '/contacts') {echo ' active';} ?>" href="/contacts">Favorite contacts</a></li>
                <li><a class="header__link<?php if($route === '/logout') {echo ' active';} ?>" href="/logout">Logout</a></li>
                <?php } ?>
                <li><b><?= $currentUser['username'] ?></b></li>
            </ul>
        </nav>
        <p>
            <?php $routes_str ?>
        </p>
    </header>
    <main class="page">