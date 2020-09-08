<?php
$error_fields = [];
$json_obj = json_decode($_POST['json_obj'], true);
$login = $json_obj['login'];
$pass = $json_obj['pass'];
if (!empty($login && $pass)) {
    // $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    require_once 'BDConfig.php';
    $sql = "SELECT * FROM `admins` WHERE login= '$login'";
    $query = $pdo->query($sql);
    $pri = $query->fetch(PDO::FETCH_OBJ);
    if ($pri) {
        $hash_pass = $pri->pass;
        $pass = password_verify($pass, $hash_pass);
        if (!$pass) {
            $response = [
                "status" => false,
                "msg" => "Неправильный логин или пароль"
            ];
            echo json_encode($response);

        } else {
            if ($pri->admin == 1) {
                $response = [
                    'status' => true,
                    'admin' => true
                ];
                echo json_encode($response);
            } else {
                $response = [
                    'status' => true
                ];
                echo json_encode($response);
            }


        }
    } elseif (!$pri) {
        $response = [
            "status" => false,
            "msg" => "Неправильный логин или пароль"

        ];
        echo json_encode($response);
    }
} else {
    if (empty($login)) {
        $error_fields[] = 'login';

    }
    if (empty($pass)) {
        $error_fields[] = 'pass';
    }
    $response = [
        "status" => false,
        "type" => 1,
        "field" => $error_fields,
        "msg" => "Вы забыли ввести данные"
    ];
    echo json_encode($response);

}

