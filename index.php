<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Shop</title>
    <link rel="stylesheet" href="css/style.css">
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
        <form id="login-form" class="form-inputs" action="process.php" method="post">
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" name="email" required>
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <form id="register-form" class="form-inputs" action="process.php" method="post" style="display: none">
            <label for="register-name">Name:</label>
            <input type="text" id="register-name" name="name" required>
            <label for="register-email">Email:</label>
            <input type="email" id="register-email" name="email" required>
            <label for="register-password">Password:</label>
            <input type="password" id="register-password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>

    <div id="message"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>