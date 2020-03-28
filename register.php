<?php
//session_start();
$error_fields = [];
$error_msg = '';
$send = true;
$type = 0;
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
$tel = filter_var(trim($_POST['tel']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);

if (empty($login)) {
    $status = false;
    $type = 1;
    $error_fields[] = 'login';
    $error_msg = 'Заполните все поля';
    $send = false;
}
elseif (mb_strlen($login) < 4) {
    $status = false;
    $send = false;
    $error_msg = 'Длина логина не должна быть меньше 4 символов';
}
if (empty($_POST['pass'])) {
    $status = false;
    $type = 1;
    $error_fields[] = 'pass';
    $error_msg = 'Заполните все поля';
    $send = false;

}
if (empty($_POST['pass_rpt'])){
    $status = false;
    $type = 1;
    $error_fields[] = 'pass_rpt';
    $error_msg = 'Заполните все поля';
    $send = false;

}
if ($_POST['pass'] !== $_POST['pass_rpt']) {
    $status = false;
    $error_msg = 'Пароли не совпадают';
    $send = false;
}
if (empty($_POST['email'])) {
    $status = false;
    $type = 1;
    $error_fields[] = 'email';
    $error_msg = 'Заполните все поля';
    $send = false;

} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $send = false;
    $status = false;
    $error_msg = 'Необходимо ввести правильную почту';
}
$pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
require_once 'BDConfig.php';
if ($send) {
    $sql = "SELECT * FROM `admins` WHERE login= '$login'";
    $query = $pdo->query($sql);
    $pri = $query->fetchAll();


    if (!$pri) {
        $sql = 'INSERT INTO admins(login, pass, email, name, last_name, tel) 
        VALUES (:login, :pass, :email, :name, :last_name, :tel)';
        $query = $pdo->prepare($sql);
        $query->execute(['login' => $_POST['login'], 'pass' => $pass,
            'email' => $_POST['email'], 'name' => $name,
            "last_name" => $last_name, 'tel' => $tel]);
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

