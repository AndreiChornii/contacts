<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function valid($data) {

    $errors = [];

    if (!preg_match('/^[а-яa-z0-9\-_\.]{5,25}$/i', $data['name'])) {
        $errors['name'] = 'name is not valid';
    }
    // var_dump($data);
    if (!preg_match('/^[0-9a-z.\-_]{1,15}@[0-9a-z.\-_]{1,14}\.[a-z.\-_]{1,10}$/i', $data['email'])) {
        $errors['email'] = 'email is not valid';
    }
    if (!preg_match('/^(\+380|380|80}0){1,4}[0-9]{9}$/i', $data['phone'])) {
        $errors['phone'] = 'phone is not valid';
    }
    if (!preg_match('/^[а-яa-z0-9\-_\.]{5,25}$/i', $data['password'])) {
        $errors['password'] = 'password is not valid';
    }
    if (!(gettype($data['subscribe']) === 'boolean')) {
        $errors['subscribe'] = 'subscribe is not valid';
    }

    if ($errors) {
        return $errors;
    }
    return true;
}


function validEmail($data) {

    $errors = [];

    if (!preg_match('/^[0-9a-z.\-_]{1,15}@[0-9a-z.\-_]{1,14}\.[a-z.\-_]{1,10}$/i', $data['email'])) {
        $errors['email'] = 'email is not valid';
    }
    
    if ($errors) {
        return $errors;
    }
    return true;
}

function validTtn($data) {

    $errors = [];

    if (!preg_match('/^[0-9]{14}$/i', $data['ttn'])) {
        $errors['ttn'] = 'ttn is not valid';
    }
    
    if ($errors) {
        return $errors;
    }
    return true;
}