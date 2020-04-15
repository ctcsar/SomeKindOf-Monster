<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Some Kind Of Monster</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<form class="main">
    <h1>Добро пожаловать на сайт</h1>
    <h3 align="center">Some Kind Of Monster</h3>
    <p class="reg_form" align="center">Введите свои данные:</p>
    <table align="center">
        <tr>
            <th><label>Логин:</label></th>
            <td><input type="text" name="login" placeholder=" логин" class="text_area"></td>
        </tr>
        <tr>
            <th><label>Пароль:</label></th>
            <td><input type="password" name="pass" placeholder=" пароль" class="text_area"><br></td>
        </tr>
    </table>
    <button class="btn btn-success btn_SignIn" type="button">Авторизоваться</button>
    <p class="reg_form">Если вы еще не регестрировались, пройдите по ссылке: <a href="register_form.php">Зарегестрироваться</a>
    </p>
    <p class="msg none">Hello</p>
</form>
<script src="JS/jquery-3.4.1.min.js"></script>
<script src="JS/main.js"></script>
</body>
</html>
