<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form id="registerForm" action="proses.php" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" required onkeyup="usernameKeyUp()" />
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required />
                <button type="button"  class="toggle-password" id="togglePassword">&#128065;</button>
            </div>
            <div class="form-group">
                <select id="role" name="role" required>
                    <option id="user" value="user">User</option>
                    <option id="admin" value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" name='regis' class="register-btn">Register</button>
        </form>
    </div>
    <script src="js/register.js"></script>
</body>
</html>