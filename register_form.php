<?php //session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Register Some Kind Of Monster</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<form class="main">
    <h1>Регистрационная форма</h1>
    <h3 align="center">Some Kind Of Monster</h3>
    <table align="center">
        <tr>
            <th><label>Логин:<b class="important">*</b></label></th>
            <td><input type="text" name="login" placeholder=" логин" class="text_area"></td>
        </tr>
                <tr>
            <th><label>Пароль:<b class="important">*</b></label></th>
            <td><input type="password" name="pass" placeholder=" пароль" class="text_area"><br></td>
        </tr>
        <tr>
            <th><label>Пароль еще раз:<b class="important">*</b></label></th>
            <td><input type="password" name="pass_rpt" placeholder=" пароль еще раз" class="text_area"><br></td>
        </tr>
        <tr>
            <th><label>Е-майл:<b class="important">*</b></label></th>
            <td><input type="text" name="email" placeholder=" email" class="text_area"></td>
        </tr>
        <tr>
            <th><label>Имя:</label></th>
            <td><input type="text" name="name" placeholder=" имя" class="text_area"></td>
        </tr>
        <tr>
            <th><label>Фамилия:</label></th>
            <td><input type="text" name="last_name" placeholder=" фамилия" class="text_area"></td>
        </tr>
        <tr>
            <th><label>Телефон:</label></th>
            <td><input type="text" name="tel" placeholder=" телефон" class="text_area"></td>
        </tr>


    </table>
    <button class="btn btn-success btn-register btn_SignUp" type="button">Зарегистрироваться</button>
    <p class="reg_form">Если вы уже зарегестрировались, пройдите по ссылке: <a href="index.php">Авторизоваться</a></p>
    <p class="msg none">Message</p>
    <small><b class="important">*</b>отмеченые поля, обязательные для заполнения</small>
</form>
<script src="JS/jquery-3.4.1.min.js"></script>
<script src="JS/main.js"></script>
</body>
</html>
