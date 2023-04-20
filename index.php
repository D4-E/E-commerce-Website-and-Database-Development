<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Online Shop</title>
  <link rel="stylesheet" href="css/style.css">
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

  <div class="loader-container">
    <div class="spinner-container">
      <div class="spinner-1"></div>
      <div class="spinner-2"></div>
      <div class="spinner-3"></div>
      <div class="spinner-4"></div>
      <div class="spinner-5"></div>
      <div class="spinner-6"></div>
      <div class="spinner-7"></div>
      <div class="spinner-8"></div>
      <div class="spinner-9"></div>
      <div class="spinner-10"></div>
      <div class="spinner-11"></div>
      <div class="spinner-12"></div>
    </div>
  </div>

  <div class="notification">
    <div class="notification-content">
      <span class="notification-message"></span>
      <div class="notification-progress"></div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
