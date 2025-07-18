<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="cek_login.php" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" required onkeyup="usernameKeyUp()" />
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required />
                <button type="button" class="toggle-password" id="togglePassword">&#128065;</button>
            </div>
            <button type="submit" class="login-btn" id="loginBtn">
                <span>Login</span>
                <div class="loading-spinner"></div>
            </button>
        </form>
    </div>
    <script src="js/login.js"></script>
</body>
</html>