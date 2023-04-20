<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-DyJjsPzOwxuxjwD1gxE/RbMUnJvZfroF52O7GcX+XeDjz8TDWf+i/CfdTlT2QmrmJvH8sWeJFfn1tijwmXvrHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-J6qa4849blE7LVr8RqWNibn0rYXaXuPp6i5+XbgXQ6ZB/rTQNyF2Oa/6s7tuHLQ2"
        crossorigin="anonymous"></script>
    <style>
        /* Стили для прямоугольника */
        .rectangle {
            width: 670px;
            border-radius: 20px;
            background-color: #f2f2f2;
            margin: 50px auto;
            padding: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        /* Стили для кнопок переключения форм */
        .form-switcher {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .form-switcher button {
            border: none;
            background-color: #eaeaea;
            cursor: pointer;
            margin: 0 10px;
            font-size: 18px;
            color: #999999;
            text-decoration: none;
            border-radius: 20px;
            padding: 10px 20px;
        }

        .form-switcher button.active {
            background-color: #ffd700;
            color: #000000;
        }

        /* Стили для формы */
        .form-inputs {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-inputs label {
            margin-top: 20px;
            font-size: 18px;
        }

        .form-inputs input[type="text"],
        .form-inputs input[type="email"],
        .form-inputs input[type="password"] {
            width: 300px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 16px;
            margin-top: 5px;
        }

        .form-inputs button[type="submit"] {
            width: 150px;
            height: 40px;
            border-radius: 5px;
            border: none;
            background-color: #ffd700;
            color: #000000;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
        }

        .form-inputs button[type="submit"]:hover {
            background-color: #ffc107;
        }

        /* Стили для лоадера */
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .loader:before {
            content: "";
            display: block;
            width: 60%;
            height: 60%;
            border-radius: 50%;
            position: absolute;
            top: 20%;
            left: 20%;
            border: 5px solid #ffd700;
            border-top-color: transparent;
            animation: spin 1s ease-in-out infinite;
        }

        .loader:after {
            content: "";
            display: block;
            width: 40%;
            height: 40%;
            border-radius: 50%;
            position: absolute;
            top: 30%;
            left: 30%;
            border: 5px solid #ffd700;
            border-bottom-color: transparent;
            animation: spin 0.5s ease-in-out infinite reverse;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Стили для уведомления */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            display: none;
        }

        .notification-message {
            font-size: 18px;
            margin-bottom: 10px;
            color: #000000;
        }

        .notification-progress {
            height: 5px;
            background-color: #ffc107;
            border-radius: 5px;
            width: 0%;
        }
    </style>
</head>

<body>
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <div class="notification">
        <div class="notification-message"></div>
        <div class="notification-progress"></div>
    </div>
    <div class="rectangle">
        <div class="form-switcher">
            <button class="active" id="login-btn">Login</button>
            <button id="register-btn">Register</button>
        </div>
        <form id="login-form" class="form-inputs" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <form id="register-form" class="form-inputs" method="post" style="display: none">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Получаем кнопки переключения формы
            var loginBtn = $('#login-btn');
            var registerBtn = $('#register-btn');

            // Получаем формы авторизации и регистрации
            var loginForm = $('#login-form');
            var registerForm = $('#register-form');

            // Получаем контейнер лоадера и уведомления
            var loaderContainer = $('.loader-container');
            var notification = $('.notification');

            // Получаем элементы уведомления
            var notificationMessage = $('.notification-message');
            var notificationProgress = $('.notification-progress');

            // Добавляем обработчик события для кнопки Login
            loginBtn.on('click', function () {
                // Убираем класс active у кнопки Register
                registerBtn.removeClass('active');
                // Добавляем класс active кнопке Login
                loginBtn.addClass('active');
                // Показываем форму Login
                loginForm.show();
                // Скрываем форму Register
                registerForm.hide();
            });

            // Добавляем обработчик события для кнопки Register
            registerBtn.on('click', function () {
                // Убираем класс active у кнопки Login
                loginBtn.removeClass('active');
                // Добавляем класс active кнопке Register
                registerBtn.addClass('active');
                // Скрываем форму Login
                loginForm.hide();
                // Показываем форму Register
                registerForm.show();
            });

            // Добавляем обработчик события для отправки формы
            $('form').on('submit', function (event) {
                event.preventDefault(); // Отменяем стандартное поведение формы

                // Показываем лоадер
                loaderContainer.show();

                // Получаем данные формы
                var form = $(this);
                var formData = form.serialize();

                // Отправляем запрос на сервер
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Прячем лоадер
                        loaderContainer.hide();

                        // Очищаем форму
                        form.trigger('reset');

                        // Показываем уведомление
                        notification.show();

                        // Выводим сообщение в уведомление
                        notificationMessage.text(response.message);

                        // Запускаем таймер для скрытия уведомления
                        var progress = 0;
                        var timer = setInterval(function () {
                            progress++;
                            notificationProgress.width(progress + '%');
                            if (progress == 100) {
                                clearInterval(timer);
                                notification.hide();
                            }
                        }, 20);
                    },
                    error: function (response) {
                        // Прячем лоадер
                        loaderContainer.hide();

                        // Выводим сообщение об ошибке в консоль
                        console.error(response);
                    }
                });
            });
        });
    </script>
</body>

</html>