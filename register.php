<?php
//session_start();
$error_fields = [];
$error_msg = '';
$send = true;
$type = 0;
$json_var = json_decode($_POST['json_var'], true);
$name = $json_var['name'];
$last_name = $json_var['last_name'];
$tel = $json_var['tel'];
$login = $json_var['login'];
$pass = $json_var['pass'];
$pass_rpt = $json_var['pass_rpt'];
$email = $json_var['email'];

if (empty($login)) {
    $status = false;
    $type = 1;
    $error_fields[] = 'login';
    $error_msg = 'Заполните все поля';
    $send = false;
} elseif (mb_strlen($login) < 4) {
    $status = false;
    $send = false;
    $error_msg = 'Длина логина не должна быть меньше 4 символов';
}
if (empty($pass)) {
    $status = false;
    $type = 1;
    $error_fields[] = 'pass';
    $error_msg = 'Заполните все поля';
    $send = false;
}
if (empty($pass_rpt)) {
    $status = false;
    $type = 1;
    $error_fields[] = 'pass_rpt';
    $error_msg = 'Заполните все поля';
    $send = false;
}
if ($pass !== $pass_rpt) {
    $status = false;
    $error_msg = 'Пароли не совпадают';
    $send = false;
}
if (empty($email)) {
    $status = false;
    $type = 1;
    $error_fields[] = 'email';
    $error_msg = 'Заполните все поля';
    $send = false;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $send = false;
    $status = false;
    $error_msg = 'Необходимо ввести правильную почту';
}
$pass = password_hash($pass, PASSWORD_BCRYPT);
require_once 'BDConfig.php';
if ($send) {
    $sql = "SELECT * FROM `admins` WHERE login= '$login'";
    $query = $pdo->query($sql);
    $pri = $query->fetchAll();


    if (!$pri) {
        $sql = 'INSERT INTO admins(login, pass, email, name, last_name, tel) 
        VALUES (:login, :pass, :email, :name, :last_name, :tel)';
        $query = $pdo->prepare($sql);
        $query->execute([
            'login' => $login, 'pass' => $pass,
            'email' => $email, 'name' => $name,
            "last_name" => $last_name, 'tel' => $tel
        ]);
        $status = true;
    } else {
        $status = false;
        $error_msg = 'Такой логин уже существует';
    }
}
$responce = [
    'status' => $status,
    'type' => $type,
    'field' => $error_fields,
    'msg' => $error_msg
];
echo json_encode($responce);
