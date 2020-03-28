/*Форма авторизации*/
$('html').keydown(function(e){ //отлавливаем нажатие клавиш
    if (e.keyCode == 13) { //если нажали Enter, то true
        $('input').removeClass('empty');
        $('.btn_SignIn').click()// Нажатие на клавиатуре Enter инициирует нажатие кнопки отправки
    }
});
$('.btn_SignIn').click(function() {//отслеживаем нажатие кнопки "Авторизация"
    let login = $('input[name="login"]').val(),
        pass = $('input[name="pass"]').val();
    $('input').removeClass('empty');// Очищаем выделениие полей, если они остались с предыдущего заполнения



    $.ajax({
        url: 'auth.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: pass
        },
        success (data)
    {
        if (data.status){
            if (data.admin){
                document.location.href = 'admin.php'
            }
            else {
                document.location.href = 'Hello.php'
            }
        }else {
            if (data.type === 1){
                data.field.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('empty');

                })
            }
            $('.msg').removeClass('none').text(data.msg);
        }
    }
});
});

/*Форма регистрации*/
$('html').keydown(function(e){ //отлавливаем нажатие клавиш
    if (e.keyCode == 13) { //если нажали Enter, то true
        $('input').removeClass('empty');
        $('.btn_SignUp').click()// Нажатие на клавиатуре Enter инициирует нажатие кнопки отправки
    }
});
$('.btn_SignUp').click(function() {
    let login = $('input[name="login"]').val(),
        pass = $('input[name="pass"]').val(),
        pass_rpt = $('input[name="pass_rpt"]').val(),
        email = $('input[name="email"]').val(),
        name = $('input[name="name"]').val(),
        last_name = $('input[name="last_name"]').val(),
        tel = $('input[name="tel"]').val();
    $('input').removeClass('empty');



    $.ajax({
        url: 'register.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: pass,
            pass_rpt: pass_rpt,
            email: email,
            name: name,
            last_name: last_name,
            tel: tel
        },
        success (data)
    {
        if (data.status){
            document.location.href = 'index.php'
        }else {
            if (data.type === 1){
                data.field.forEach(function (fields) {
                    $(`input[name="${fields}"]`).addClass('empty');

                })
            }
                $('.msg').removeClass('none').text(data.msg);

        }
    }
});
});
