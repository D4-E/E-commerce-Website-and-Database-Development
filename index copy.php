<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Shop</title>
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

    <script>
        // Получаем кнопки переключения формы
        var loginBtn = document.getElementById('login-btn');
        var registerBtn = document.getElementById('register-btn');

        // Получаем формы авторизации и регистрации
        var loginForm = document.getElementById('login-form');
        var registerForm = document.getElementById('register-form');

        // Добавляем обработчик события для кнопки Login
        loginBtn.addEventListener('click', function () {
            // Убираем класс active у кнопки Register
            registerBtn.classList.remove('active');
            // Добавляем класс active кнопке Login
            loginBtn.classList.add('active');
            // Показываем форму Login
            loginForm.style.display = 'flex';
            // Скрываем форму Register
            registerForm.style.display = 'none';
        });

        // Добавляем обработчик события для кнопки Register
        registerBtn.addEventListener('click', function () {
            // Убираем класс active у кнопки Login
            loginBtn.classList.remove('active');
            // Добавляем класс active кнопке Register
            registerBtn.classList.add('active');
            // Скрываем форму Login
            loginForm.style.display = 'none';
            // Показываем форму Register
            registerForm.style.display = 'flex';
        });
    </script>
</body>
</html>