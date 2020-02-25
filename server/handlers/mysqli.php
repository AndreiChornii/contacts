<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function deleteLink($fields){
    try {
    $pdo = new PDO('mysql:host=localhost;dbname=form_php;charset=utf8', 'ijdb_sample', 'mypassword');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'delete from links 
                 where `id_user` = :id_user
                   and `id_contact` = :id_contact';

        $query = $pdo->prepare($sql);
	$query->execute($fields);
        return 'ok';
    }
    catch (PDOException $e) {
	$output = 'Unable to to insert: ' . $e->getMessage() . ' in ' .
	$e->getFile() . ':' . $e->getLine();
        return $output;
    }    
}

function insertLink($fields){
    try {
    $pdo = new PDO('mysql:host=localhost;dbname=form_php;charset=utf8', 'ijdb_sample', 'mypassword');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'insert into links(`id_user`, `id_contact`)
                       VALUES(:id_user, :id_contact);';

        $query = $pdo->prepare($sql);
	$query->execute($fields);
        return 'ok';
    }
    catch (PDOException $e) {
	$output = 'Unable to to insert: ' . $e->getMessage() . ' in ' .
	$e->getFile() . ':' . $e->getLine();
        return $output;
    }    
}

function getUserContacts($fields){
    $pdo = new PDO('mysql:host=localhost;dbname=form_php;charset=utf8', 'ijdb_sample', 'mypassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = '  select Contact
                from contacts
                join links on contacts.id=links.id_contact
                join users on users.id=links.id_user
                          and users.id = :id_user
              order by contacts.Contact;';

    $query = $pdo->prepare($sql);
    $query->execute($fields);
    return $query->fetchAll();
}

function getContacts(){
    $pdo = new PDO('mysql:host=localhost;dbname=form_php;charset=utf8', 'ijdb_sample', 'mypassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'select id,contact from contacts;';

    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function getUsers(){
//    $DB = mysqli_connect("127.0.0.1", "andrei", "Aaaaaaa1", "website");
    $DB = mysqli_connect("localhost", "ijdb_sample", "mypassword", "form_php");
    if (!$DB) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
//
//echo "Соединение с MySQL установлено!" . PHP_EOL;
//echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

    $data = $DB->query('select id, username, email, phone
                          from users');

    $users = $data->fetch_all(MYSQLI_ASSOC);
//    var_dump($users->fetch_all(MYSQLI_ASSOC));

    mysqli_close($DB);
    
    return $users;
}

function getUser($email){
//    $DB = mysqli_connect("127.0.0.1", "andrei", "Aaaaaaa1", "website");
    $DB = mysqli_connect("localhost", "ijdb_sample", "mypassword", "form_php");

    if (!$DB) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
//
//echo "Соединение с MySQL установлено!" . PHP_EOL;
//echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

    $dataUser = $DB->query("select id, username, password, email, phone
                              from users 
                             where email = '{$email}'");

    $user = $dataUser->fetch_all(MYSQLI_ASSOC);
//    var_dump($users->fetch_all(MYSQLI_ASSOC));

    mysqli_close($DB);
    
    return $user;
}

function addUser($data){
//    $DB = mysqli_connect("127.0.0.1", "andrei", "Aaaaaaa1", "website");
    $DB = mysqli_connect("localhost", "ijdb_sample", "mypassword", "form_php");

    if (!$DB) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    $sql = "insert into users(username, email, `password`, phone, age)
                       VALUES ('{$data['name']}', '{$data['email']}', '{$data['password']}', '{$data['phone']}', {$data['age']});";
//
//echo "Соединение с MySQL установлено!" . PHP_EOL;
//echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

    $resultQuery = $DB->query($sql);

    mysqli_close($DB);
    
//    var_dump($resultQuery);
    
    return $resultQuery;
}