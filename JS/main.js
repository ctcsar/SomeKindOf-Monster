/*Форма авторизации*/
$('html').keydown(function (e) { //отлавливаем нажатие клавиш
    if (e.keyCode == 13) { //если нажали Enter, то true
        $('.btn_SignUp').click();// Нажатие на клавиатуре Enter инициирует нажатие кнопки отправки
        $('.btn_SignIn').click();
    }
});
let is_admin = 0;



$('.btn_SignIn').click(function () {//отслеживаем нажатие кнопки "Авторизация"
    let login = $('#login').val(),
        pass = $('#pass').val();
    $('input').removeClass('empty');// Очищаем выделениие полей, если они остались с предыдущего заполнения

    let json_obj = {
        login: login,
        pass: pass
    };

    $.ajax({
        url: 'auth.php',
        type: 'POST',
        dataType: 'json',
        data: {
            json_obj: JSON.stringify(json_obj),
        },
        success(data) {
            if (data.status) {
                if (data.admin) {

                    document.location.href = 'admin.php';

                } else {
                    document.location.href = 'Hello.php'
                }
            } else {
                if (data.type === 1) {
                    data.field.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('empty');

                    });
                }

                $('.msg').removeClass('none').text(data.msg);

            }

        }
    });
    if (is_admin == 1) {
        alert('admin');


    }

});




/*Форма регистрации*/

$('.btn_SignUp').click(function () {
    let json_var = {}; 
    $.each($(".input_field"), function (index, element) {
        json_var[this.name] = $(element).val();
    })
    $('input').removeClass('empty');


    $.ajax({
        url: 'register.php',
        type: 'POST',
        dataType: 'json',
        data: {
             json_var: JSON.stringify(json_var) 
            },
        success(data) {
            if (data.status) {
                document.location.href = 'index.php'
            } else {
                if (data.type === 1) {
                    data.field.forEach(function (fields) {
                        $(`input[name="${fields}"]`).addClass('empty');

                    })
                }
                $('.msg').removeClass('none').text(data.msg);

            }
        }
    });
});
