<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function deleteLink($fields, $pdo){
    try {
        $sql = 'delete from links 
                 where `id_user` = :id_user
                   and `id_contact` = :id_contact';

        $query = $pdo->prepare($sql);
	$query->execute($fields);
        $pdo = null;
        return 'ok';
    }
    catch (PDOException $e) {
	$output = 'Unable to to insert: ' . $e->getMessage() . ' in ' .
	$e->getFile() . ':' . $e->getLine();
        return $output;
    }    
}

function insertLink($fields, $pdo){
    try {
        $sql = 'insert into links(`id_user`, `id_contact`)
                       VALUES(:id_user, :id_contact);';

        $query = $pdo->prepare($sql);
	$query->execute($fields);
        $pdo = null;
        return 'ok';
    }
    catch (PDOException $e) {
	$output = 'Unable to to insert: ' . $e->getMessage() . ' in ' .
	$e->getFile() . ':' . $e->getLine();
        return $output;
    }    
}

function getUserContacts($fields, $pdo){
    $sql = '  select contacts.id, contacts.Contact
                from contacts
                join links on contacts.id=links.id_contact
                join users on users.id=links.id_user
                          and users.id = :id_user
              order by contacts.Contact;';

    $query = $pdo->prepare($sql);
    $query->execute($fields);
    $pdo = null;
    return $query->fetchAll();
}

function getContacts($fields, $pdo){
    $sql = '  select contacts.id, contacts.Contact
                from contacts 
               where Contact not in (
                            select contacts.Contact
                              from contacts
                              join links on contacts.id=links.id_contact
                              join users on users.id=links.id_user
                                        and users.id = :id_user
              )
              order by contacts.Contact;';

    $query = $pdo->prepare($sql);
    $query->execute($fields);
    $pdo = null;
    return $query->fetchAll();
}

function getUsers($DB){
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

function getUser($email, $pdo){
    
    try {
        $sql = "select id, username, password, email, phone
                              from users 
                             where email = :email";

        $fields['email'] = $email;

        $query = $pdo->prepare($sql);
        $query->execute($fields);
        $pdo = null;
        return $query->fetchAll();
    } catch (PDOException $e) {
        $output = 'Unable to get user: ' . $e->getMessage() . ' in ' .
                $e->getFile() . ':' . $e->getLine();
        return $output;
    }
}

function addUser($data, $pdo){
    
 try {
        $sql = "insert into users(username, email, `password`, phone, age)
                       VALUES (:name, :email, :password, :phone, :age);";

        $fields['name'] = $data['name'];
        $fields['email'] = $data['email'];
        $fields['password'] = $data['password'];
        $fields['phone'] = $data['phone'];
        $fields['age'] = $data['age'];

        $query = $pdo->prepare($sql);
	$query->execute($fields);
        $pdo = null;
        return 'ok';
    }
    catch (PDOException $e) {
	$output = 'Unable to add user: ' . $e->getMessage() . ' in ' .
	$e->getFile() . ':' . $e->getLine();
        return $output;
    }   
}