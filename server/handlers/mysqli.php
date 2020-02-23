<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



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

function changeEmail($data){
//    $DB = mysqli_connect("127.0.0.1", "andrei", "Aaaaaaa1", "website");
    $DB = mysqli_connect("localhost", "ijdb_sample", "mypassword", "form_php");

    if (!$DB) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    $email = $data['email'];
    $id = $data['id'];
    
    $sql = "UPDATE users
               SET email = '$email'
             WHERE id = '$id'";
//
//echo "Соединение с MySQL установлено!" . PHP_EOL;
//echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

    $resultQuery = $DB->query($sql);

    mysqli_close($DB);
    
//    var_dump($resultQuery);
    
    return $resultQuery;
}

//$user = [
//    "username" => 'vasa-1',
//    "email" => 'vasa_1@gmail.com',
//    "password" => '444444444444',
//    "phone" => '+380406669922',
//    "age" => 43
//];

//addUser($user);

function getTtns($data){
    $conn = mysqli_connect("localhost", "ijdb_sample", "mypassword", "form_php");
    mysqli_set_charset($conn, "utf8");

    if (!$conn) {
//        echo "\nConnection failed<br>\n";
    } else {
// SQL-запрос
        $id_user = $data['id'];
        $sql1 =  "select ttn, `Status`, StatusCode, ScheduledDeliveryDate 
                    from ttns 
                   WHERE id_user = '$id_user'
                     and ScheduledDeliveryDate > date_sub(curdate(), interval 1 month)
                     and ScheduledDeliveryDate <= curdate()
                order by ScheduledDeliveryDate DESC";


// Выполнить запрос (набор данных $rs содержит результат)
        $rs = mysqli_query($conn, $sql1);

        if (!($rs)) {
            $good = "Get ttns bad";
            $error_message = mysqli_error($conn);
            $error_code = mysqli_errno($conn);
            $error_sqlstate = mysqli_sqlstate($conn);
//            echo("<BR />");
//            echo $good;
//            echo("<BR />");
//            echo $error_message;
//            echo("<BR />");
//            echo $error_code;
//            echo("<BR />");
//            echo $error_sqlstate;
//            echo("<BR />");
        } else {
            $bad = "Get ttn ok";
            $error_message = mysqli_error($conn);
            $error_code = mysqli_errno($conn);
            $error_sqlstate = mysqli_sqlstate($conn);
            // echo("<BR />");
            // echo $bad;
            // echo("<BR />");
            // echo $error_message;
            // echo("<BR />");
            // echo $error_code;
            // echo("<BR />");
            // echo $error_sqlstate;
            // echo("<BR />");

            $mas = array();
            $i = 0;

// Цикл по recordset $rs
// Каждый ряд становится массивом ($row) с помощью функции mysql_fetch_array

            while ($row = mysqli_fetch_array($rs)) {

                // Записать значение столбца id_doc, date_doc, ... (из массива $row)
                $ttn = $row['ttn'];
                $Status = $row['Status'];
                $StatusCode = $row['StatusCode'];
                $ScheduledDeliveryDate = $row['ScheduledDeliveryDate'];

                $result_ok = array(
                    'ttn' => $ttn,
                    'Status' => $Status,
                    'StatusCode' => $StatusCode,
                    'ScheduledDeliveryDate' => trim($ScheduledDeliveryDate),
                );

                $mas[$i] = $result_ok;
                $i++;
            }

// Закрыть соединение с БД
            mysqli_close($conn);

            return $mas;
        }
    }
}

function saveTtn($data){
//    var_dump($data);
    
    $mysql_ScheduledDeliveryDate = substr($data['ScheduledDeliveryDate'], 6, 4) . '-' . substr($data['ScheduledDeliveryDate'], 3, 2) . '-' . substr($data['ScheduledDeliveryDate'], 0, 2);
    $data['ScheduledDeliveryDate'] = $mysql_ScheduledDeliveryDate;     
//    echo $data['ScheduledDeliveryDate'];
//    var_dump($data);
    $DB = mysqli_connect("localhost", "ijdb_sample", "mypassword", "form_php");
    $sql_max = "SELECT max(id) as max_id FROM ttns";
    $query_max = mysqli_query($DB, $sql_max);
    while ($row = mysqli_fetch_array($query_max)) {
// Записать значение столбца amount_of_num  (который является теперь массивом $row)
        $max_num = $row['max_id'];
    }

    if ($query_max) {
        $result = "update ok";
        // echo json_encode($result);
    } else {
        $result = "update wrong";
// printf("Error message: %s\n", mysqli_error($conn2));
        //          print_r("<BR />");
        //          printf("Error code: %s\n", mysqli_errno($conn2));
        //          print_r("<BR />");
        //          printf("Error SQLSTATE: %s.\n", mysqli_sqlstate($conn2));
        //          print_r("<BR />");
        //          print_r("--------------");
//    echo json_encode($result);
    }
// Закрыть соединение с БД
    mysqli_close($DB);

// Соединиться с сервером БД
    $DB = mysqli_connect("localhost", "ijdb_sample", "mypassword", "form_php");
    mysqli_set_charset($DB, "utf8");
    if (!$DB) {
        $result = "Connection failed";
//        echo json_encode($result);
    } else {

        //$num = $_POST['num'];
        $id = $max_num + 1;
        $ttn = $data['ttn'];
        $Status = $data['Status'];
        $StatusCode = $data['StatusCode'];
        $ScheduledDeliveryDate = $data['ScheduledDeliveryDate'];
        $id_user = $data['id'];
        
        // SQL-запрос
// $sql1 = "INSERT INTO `reestr`(num, descr, trespassing, date, who, source, risk_destroy, process_name, department, comment)
//  VALUES (82, 'Отримання клієнтами підроблених документів щодо заборгованості перед банком, які направляються банком', 'Отримання клієнтами підроблених документів щодо заборгованості перед банком. Крім того, вимога з ознаками залякування', '2018-02-13', 'Сігал Н.В.', 'Інформація з відділення банку', 'Проводяться заходи щодо попередження зазначеного комплаєнс-ризику','Моніторинг по роботі з кредитними картками','Департамент з моніторингу по роботі з кредитними картками - (Польща В.В.)','Здійснюються язаходи щодо попередження зазначеного комплаєнс-ризику')";

        $sql1 = "INSERT INTO ttns(id, id_user, ScheduledDeliveryDate, Status, StatusCode, ttn)
                 VALUES ($id, $id_user, '$ScheduledDeliveryDate', '$Status', $StatusCode, $ttn);
                ";

// Выполнить запрос (набор данных $rs содержит результат)
//$rs = mysqli_query($strSQL);
        $rs = mysqli_query($DB, $sql1);

// Цикл по recordset $rs
// Каждый ряд становится массивом ($row) с помощью функции mysql_fetch_array
// Закрыть соединение с БД

        if ($rs) {
            $result = "Wrote ok";
//            echo json_encode($result);
        } else {
            $result = "Wrote wrong";
            $error_message = mysqli_error($DB);
            $error_code = mysqli_errno($DB);
            $error_sqlstate = mysqli_sqlstate($DB);
//            echo("<BR />");
//            echo $error_message;
//            echo("<BR />");
//            echo $error_code;
//            echo("<BR />");
//            echo $error_sqlstate;
//            echo("<BR />");
//            echo json_encode($result);
        }
        mysqli_close($DB);
    }
}

function getStatus($data){
    
//    $ttn = $data['ttn'];
//    $id = $data['id'];
//    var_dump($data);
//    header("Content-Type: application/json;charset=UTF-8");
//    ini_set('max_execution_time', 300);

    $url_str = 'https://api.novaposhta.ua/v2.0/json/';
    $post_str = '
        {
            "apiKey": "8b9134af8dddb5e26f98be43c5fdf847",
            "modelName": "TrackingDocument",
            "calledMethod": "getStatusDocuments",
            "methodProperties": {
                "Documents": [
                    {
                        "DocumentNumber": "' . $data['ttn'] . '",
                        "Phone":""
                    }
                ]
            }

        }
        ';
//    echo $post_str;
//    exit();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_str);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=UTF-8'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str
    );
    $statusDate = curl_exec($ch);
    if (curl_errno($ch)) {
        // print "Error curl: ". curl_error($ch);
        $rezult = "Error curl: " . curl_error($ch);
        $rez = "from form_php bad";
        $to_fe = array(
            'rez' => $rez,
            'rezult' => $rezult
        );
        echo json_encode($to_fe);
    } else {
        // echo("adr: ");
        //    print_r($adr);
        //    echo("<BR />");
        $decoded = json_decode($statusDate);
//        var_dump($decoded);
//        exit();
        $date = 'data';
        $got_array = $decoded->$date;
        
//        //элементы ттн
        $ttn_obj = $got_array[0];
//        var_dump($ttn_obj);
        $Sh = 'ScheduledDeliveryDate';
        $ScheduledDeliveryDate = $ttn_obj->$Sh;
        $sta = 'Status';
        $Status = $ttn_obj->$sta;
        $sta_code = 'StatusCode';
        $StatusCode = $ttn_obj->$sta_code;
//
        $data['ScheduledDeliveryDate'] = $ScheduledDeliveryDate;
        $data['Status'] = $Status;
        $data['StatusCode'] = $StatusCode;
        
        $data['rez'] = "from form_php ok";
//       
        return $data;
        
    }

//    return $resultQuery;
}