<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($method === 'POST') {
// header('Content-type:application/json');
    if ($route === '/delete') {
        $request = json_decode(file_get_contents('php://input'), true);
        
//        var_dump($_SESSION['user']['id']);

//        var_dump($request);
         $to_del['id_user'] = +$_SESSION['user']['id'];
         $to_del['id_contact'] = $request;
//         var_dump($to_ins);
        $isOk = deleteLink($to_del);
//        
        if ($isOk === 'ok') {
            echo json_encode('deleted_ok');
        } else {
            echo json_encode($isOk);
        }
    }
    
    if ($route === '/insert') {
        $request = json_decode(file_get_contents('php://input'), true);
        
//        var_dump($_SESSION['user']['id']);

//        var_dump($request);
         $to_ins['id_user'] = +$_SESSION['user']['id'];
         $to_ins['id_contact'] = $request;
//         var_dump($to_ins);
        $isOk = insertLink($to_ins);
//        
        if ($isOk === 'ok') {
            echo json_encode('inserted_ok');
        } else {
            echo json_encode($isOk);
        }
    }
    
    if ($route === '/registration') {
        $request = json_decode(file_get_contents('php://input'), true);

        $isValid = valid($request);

        if ($isValid) {
            $responseSuccess = [
                'result' => true,
                'message' => 'registration successful, go to login'
            ];
            
            $responseFail = [
                'result' => false,
                'message' => 'email or phone already exists'
            ];
            $request['age'] = 50;
            
            $isSave = addUser($request);
            
            if($isSave) {
                echo json_encode($responseSuccess);
            } else {
                echo json_encode($responseFail);
            }

            
        } else {
            $response = [
                'result' => false,
                'message' => $isValid
            ];

            echo json_encode($response);
        }
    }
    
    if ($route === '/login') {
        
        $request = json_decode(file_get_contents('php://input'), true);
//        var_dump($request);
        
//        $email = $_POST['email'];
//        $password = $_POST['password'];
        
        $email = $request['email'];
        $password = $request['password'];
        $User = getUser($email);
        
        /* if not exists user in database or password is not correct
           send page login with error
         *          */
//        var_dump($_POST);
//        var_dump($User);
        if(empty($User) || empty($User[0]) || ($password != $User[0]['password'])) {
            $_SESSION['user'] = NULL;
            $error = 'user not found, enter correct email and password';
//            include './views/header.php';
//            include './views/login.php';
//            include './views/footer.php';
//            die;
            
            $arr = [
                'error' => $error,
                'is_error' => true
            ];

            die(json_encode($arr));
        }
        
        $_SESSION['user'] = $User[0];
        
        $isAdmin = $User[0]['email'] === 'admin@gmail.com';
         
        if($isAdmin) {
//            header("Location: /users");
            
            $go_to = '/users';
            
        } else {
//            header("Location: /");
            $go_to = '/';
        }
        
        $arr = [
                'go_to' => $go_to,
                'is_error' => false
            ];
        die(json_encode($arr));
    }
}