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
            background-color: #F2F2F2;
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
            background-color: #EAEAEA;
            cursor: pointer;
            margin: 0 10px;
            font-size: 18px;
            color: #999999;
            text-decoration: none;
            border-radius: 20px;
            padding: 10px 20px;
        }

        .form-switcher button.active {
            background-color: #FFD700;
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
            width:
                300px;
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
            background-color: #FFD700;
            color: #000000;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
        }

        .form-inputs button[type="submit"]:hover {
            background-color: #FFC107;
        }

        /* Стили для лоадера */
        .loader-container {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader {
            display: inline-block;
            position: relative;
            width: 40px;
            height: 40px;
        }

        .loader div {
            display: inline-block;
            position: absolute;
            left: 8px;
            width: 16px;
            background: #000;
            animation: loader 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
        }

        .loader div:nth-child(1) {
            left: 8px;
            animation-delay: -0.24s;
        }

        .loader div:nth-child(2) {
            left: 8px;
            animation-delay: -0.12s;
        }

        .loader div:nth-child(3) {
            left: 32px;
            animation-delay: 0;
        }

        @keyframes loader {
            0% {
                top: 8px;
                height: 24px;
            }

            50%,
            100% {
                top: 0;
                height: 40px;
            }
        }

        /* Стили для уведомления */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 250px;
            background-color: #333;
            border-radius: 10px;
            padding: 10px;
            color: #fff;
            text-align: center;
            font-size: 16px;
            z-index: 9999;
            display: none;
        }

        .notification-message {
            margin-bottom: 10px;
        }

        .notification-progress {
            height: 5px;
            background-color: #fff;
            border-radius: 5px;
            width: 0;
            transition: width 5s linear;
        }
    </style>
</head>

<body>
    <div class="rectangle">
        <div class="form-switcher">
            <button class="active" id="login-btn">Login</button>
            <button id="register-btn">Register</button>
        </div>
        <form id="login-form" class="form-inputs" action="process.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <form id="register-form" class="form-inputs" action="process.php" method="post" style="display: none">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
    <div class="loader-container" style="display:none">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="notification">
        <div class="notification-message"></div>
        <div class="notification-progress"></div>
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
                event.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                var data = form.serialize();

                // Показываем лоадер
                $('.loader-container').show();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function (response) {
                        // Скрываем лоадер
                        $('.loader-container').hide();

                        // Показываем уведомление
                        var notification = $('.notification');
                        var message = response.message;
                        notification.find('.notification-message').text(message);
                        notification.show();

                        // Автоматически скрываем уведомление через 5 секунд
                        var progress = notification.find('.notification-progress');
                        var width = 0;
                        var interval = setInterval(function () {
                            if (width >= 100) {
                                clearInterval(interval);
                                notification.hide();
                            } else {
                                width += 20;
                                progress.css('width', width + '%');
                            }
                        }, 1000);
                    },
                    error: function (xhr) {
                        // Скрываем лоадер
                        $('.loader-container').hide();

                        // Показываем уведомление об ошибке
                        var notification = $('.notification');
                        var message = xhr.responseJSON.message;
                        notification.find('.notification-message').text(message);
                        notification.show();

                        // Автоматически скрываем уведомление через 5 секунд
                        var progress = notification.find('.notification-progress');
                        var width = 0;
                        var interval = setInterval(function () {
                            if (width >= 100) {
                                clearInterval(interval);
                                notification.hide();
                            } else {
                                width += 20;
                                progress.css('width', width + '%');
                            }
                        }, 1000);
                    }
                });
            });
        });
    </script>
</body>

</html>