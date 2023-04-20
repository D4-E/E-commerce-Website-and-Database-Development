$(document).ready(function () {
    // Функция для отправки данных на сервер
    function postData(url, data, successCallback, errorCallback) {
        $.ajax({
            type: "POST",
            url: url,
            data: JSON.stringify(data),
            success: function (response) {
                successCallback(response);
            },
            error: function (error) {
                errorCallback(error.statusText);
            },
        });
    }

    // Функция для отображения уведомления
    function showNotification(type, message, duration) {
        var $notification = $("<div>", {
            class: "notification " + type,
            text: message,
        });
        var $progress = $("<div>", { class: "notification-progress" });
        $notification.append($progress);
        $("body").append($notification);
        $notification.animate(
            {
                top: 20,
                right: 20,
                opacity: 1,
            },
            500
        );
        var intervalId = setInterval(function () {
            var width = ($progress.width() / $notification.width()) * 100;
            width += 100 / (duration * 10);
            if (width > 100) {
                clearInterval(intervalId);
                $notification.animate(
                    {
                        top: -100,
                        opacity: 0,
                    },
                    500,
                    function () {
                        $notification.remove();
                    }
                );
            } else {
                $progress.width((width / 100) * $notification.width());
            }
        }, 100);
    }

    // Получаем кнопки переключения формы
    var $loginBtn = $("#login-btn");
    var $registerBtn = $("#register-btn");

    // Получаем формы авторизации и регистрации
    var $loginForm = $("#login-form");
    var $registerForm = $("#register-form");

    // Добавляем обработчик события для кнопки Login
    $loginBtn.on("click", function () {
        // Убираем класс active у кнопки Register
        $registerBtn.removeClass("active");
        // Добавляем класс active кнопке Login
        $loginBtn.addClass("active");
        // Показываем форму Login
        $loginForm.show();
        // Скрываем форму Register
        $registerForm.hide();
    });

    // Добавляем обработчик события для кнопки Register
    $registerBtn.on("click", function () {
        // Убираем класс active у кнопки Login
        $loginBtn.removeClass("active");
        // Добавляем класс active кнопке Register
        $registerBtn.addClass("active");
        // Скрываем форму Login
        $loginForm.hide();
        // Показываем форму Register
        $registerForm.show();
    });

    // Добавляем обработчик события для формы авторизации
    $loginForm.on("submit", function (event) {
        // Отменяем стандартное поведение формы
        event.preventDefault();
        // Получаем данные из формы
        var email = $loginForm.find("#email").val();
        var password = $loginForm.find("#password").val();
        var data = {
            email: email,
            password: password,
        };
        // Отправляем данные на сервер
        postData(
            "process.php",
            data,
            function (response) {
                // Показываем уведомление об успешной авторизации
                showNotification("Success", "You have successfully logged in!", 5);

                // Сбрасываем значения полей формы
                $loginForm[0].reset();
            },
            function (error) {
                // Показываем уведомление об ошибке авторизации
                showNotification("Error", error, 5);
            }
        );
    });

    // Добавляем обработчик события для формы регистрации
    $registerForm.on("submit", function (event) {
        // Отменяем стандартное поведение формы
        event.preventDefault();
        // Получаем данные из формы
        var name = $registerForm.find("#name").val();
        var email = $registerForm.find("#email").val();
        var password = $registerForm.find("#password").val();
        var data = {
            name: name,
            email: email,
            password: password,
        };
        // Отправляем данные на сервер
        postData(
            "process.php",
            data,
            function (response) {
                // Показываем уведомление об успешной регистрации
                showNotification("Success", "You have successfully registered!", 5);
                // Скрываем форму регистрации
                $registerForm.hide();
                // Сбрасываем значения полей формы
                $registerForm[0].reset();
            },
            function (error) {
                // Показываем уведомление об ошибке регистрации
                showNotification("Error", error, 5);
            }
        );
    });
});