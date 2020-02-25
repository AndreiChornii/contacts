<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($method === 'GET') {
    # code...
    
    $currentUser = $_SESSION['user'];
    
    $isAdmin = !empty($currentUser) && $currentUser['email'] === 'admin@gmail.com';
    
    if(empty($_SESSION['routes'])) {
       $_SESSION['routes'] = [];
    } 
    
    if(empty($_SESSION['routes'][$route])) {
        $_SESSION['routes'][$route] = 1;
    } else {
        $_SESSION['routes'][$route]++;
    }
    
    $routes_str = '';
    
    foreach ($_SESSION['routes'] as $k => $v) {
        $routes_str .= "{$k} = {$v} ,";
    }
    
    $routes_str = rtrim($routes_str, ',');
    

    include './views/header.php';
    
    if ($route === '/' && !empty($currentUser)) {
        $contacts = getContacts();
//        var_dump($contacts);
        include './views/home.php';
    }
    elseif ($route === '/'){
        header('Location: /login');
    }

    if ($route === '/contacts' && !empty($currentUser)) {
        
        $to_sel['id_user'] = +$currentUser['id'];
//        var_dump($to_sel);
        $contacts_list = getUserContacts($to_sel);
//        
//        var_dump($contacts_list);
        
        include './views/contacts.php';
    }
    elseif ($route === '/contacts'){
        header('Location: /login');
    }
 
    if ($route === '/registration') {
        include './views/registration.php';
    }
    
    if ($route === '/login') {
        $error = '';
        include './views/login.php';
    }
        
    if ($route === '/users' && $isAdmin) {
        $users = getUsers();
//        var_dump($users);
        include './views/users.php';
    } elseif ($route === '/users'){
        header('Location: /login');
    }

    include './views/footer.php';
}