$(document).ready(function () {
    // Получаем элементы формы Login
    var loginEmail = $('#login-email');
    var loginPassword = $('#login-password');

    // Получаем элементы формы Register
    var registerName = $('#register-name');
    var registerEmail = $('#register-email');
    var registerPassword = $('#register-password');

    // Получаем информационный блок
    var message = $('#message');

    // Получаем элементы лоадера
    var loaderContainer = $('.loader-container');
    var loader = $('.loader');

    // Получаем элементы уведомления
    var notification = $('.notification');

    // Добавляем обработчик события для кнопки Login
    $('#login-btn').on('click', function () {
        // Убираем класс active у кнопки Register
        $('#register-btn').removeClass('active');
        // Добавляем класс active кнопке Login
        $(this).addClass('active');
        // Показываем форму Login
        $('#login-form').show();
        // Скрываем форму Register
        $('#register-form').hide();
    });

    // Добавляем обработчик события для кнопки Register
    $('#register-btn').on('click', function () {
        // Убираем класс active у кнопки Login
        $('#login-btn').removeClass('active');
        // Добавляем класс active кнопке Register
        $(this).addClass('active');
        // Скрываем форму Login
        $('#login-form').hide();
        // Показываем форму Register
        $('#register-form').show();
    });

    // Добавляем обработчик события для формы Login
    $('#login-form').on('submit', function (event) {
        // Отменяем стандартное поведение формы
        event.preventDefault();
        // Отображаем лоадер и блокируем форму
        showLoader();
        disableForm('#login-form');

        // Отправляем запрос на сервер
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: {
                email: loginEmail.val(),
                password: loginPassword.val(),
            },
            success: function (response) {
                // Скрываем лоадер и разблокируем форму
                hideLoader();
                enableForm('#login-form');

                // Очищаем поля формы
                loginEmail.val('');
                loginPassword.val('');

                // Отображаем сообщение об успешной авторизации
                showMessage('You have successfully logged in.');
            },
            error: function () {
                // Скрываем лоадер и разблокируем форму
                hideLoader();
                enableForm('#login-form');

                // Очищаем поля формы
                loginEmail.val('');
                loginPassword.val('');

                // Отображаем сообщение об ошибке
                showMessage('Login failed. Please try again.');
            },
        });
    });

    // Добавляем обработчик события для формы Register
    $('#register-form').on('submit', function (event) {
        // Отменяем стандартное поведение формы
        event.preventDefault();
        // Отображаем лоадер и блокируем форму
        showLoader();
        disableForm('#register-form');

        // Отправляем запрос на сервер
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: {
                name: registerName.val(),
                email: registerEmail.val(),
                password: registerPassword.val(),
            },
            success: function (response) {
                // Скрываем лоадер и разблокируем форму
                hideLoader();
                enableForm('#register-form');

                // Очищаем поля формы
                registerName.val('');
                registerEmail.val('');
                registerPassword.val('');

                // Отображаем сообщение об успешной регистрации
                showMessage('You have successfully registered.');
            },
            error: function () {
                // Скрываем лоадер и разблокируем форму
                hideLoader();
                enableForm('#register-form');

                // Очищаем поля формы
                registerName.val('');
                registerEmail.val('');
                registerPassword.val('');

                // Отображаем сообщение об ошибке
                showMessage('Registration failed. Please try again.');
            },
        });
    });

    // Функция для отображения лоадера
    function showLoader() {
        loaderContainer.show();
    }

    // Функция для скрытия лоадера
    function hideLoader() {
        loaderContainer.hide();
    }

    // Функция для блокировки формы
    function disableForm(formId) {
        $(formId + ' input, ' + formId + ' button').attr('disabled', true);
    }

    // Функция для разблокировки формы
    function enableForm(formId) {
        $(formId + ' input, ' + formId + ' button').attr('disabled', false);
    }

    // Функция для отображения сообщения
    function showMessage(text) {
        // Отображаем блок уведомления
        notification.show();
        // Устанавливаем текст сообщения
        $('.notification-message').text(text);

        // Запускаем анимацию шкалы прогресса
        $('.notification-progress').animate(
            { width: '100%' },
            5000,
            function () {
                // Скрываем блок уведомления после завершения анимации
                notification.hide();
                // Обнуляем шкалу прогресса
                $('.notification-progress').css('width', 0);
            }
        );
    }
});




