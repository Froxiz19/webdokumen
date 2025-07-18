<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f0f2f5 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .register-container {
            background: #fff;
            padding: 32px 18px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18), 0 1.5px 6px rgba(0,0,0,0.10);
            width: 100%;
            max-width: 350px;
            box-sizing: border-box;
            margin: 0 auto;
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 28px;
            font-weight: 600;
            color: #2d3748;
            letter-spacing: 1px;
            text-shadow: 0 1px 2px #e0e7ff;
        }
        .form-group {
            margin-bottom: 22px;
            position: relative;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px 38px 12px 12px;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            background: linear-gradient(90deg, #e0e7ff 0%, #f7fafc 100%);
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            outline: none;
            transition: box-shadow 0.2s, background 0.2s;
            box-sizing: border-box;
            color: #2d3748;
            font-weight: 500;
            appearance: none;
            -webkit-appearance: none;
            position: relative;
        }
        .form-group select:focus {
            background: linear-gradient(90deg, #c3dafe 0%, #e0e7ff 100%);
            box-shadow: 0 4px 16px rgba(0,0,0,0.13);
            border: 1.5px solid #007bff;
        }
        .form-group select option {
            background: #fff;
            color: #2d3748;
            font-weight: 500;
            padding: 10px;
            border-radius: 8px;
        }
        .form-group input:focus, .form-group select:focus {
            background: #e0e7ff;
            box-shadow: 0 4px 16px rgba(0,0,0,0.13);
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 22px;
            color: #6c757d;
            transition: color 0.2s;
            padding: 0;
        }
        .toggle-password:active {
            color: #007bff;
        }
        .register-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.10);
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
            position: relative;
            margin-top: 10px;
        }
        .register-btn:hover {
            background: linear-gradient(90deg, #feb47b 0%, #ff7e5f 100%);
            box-shadow: 0 4px 16px rgba(255,126,95,0.18);
            transform: translateY(-2px) scale(1.03);
        }
        @media (max-width: 480px) {
            body {
                padding: 0 12px;
            }
            .register-container {
                padding: 18px 12px;
                max-width: 98vw;
                border-radius: 12px;
                margin: 0 auto;
            }
            .form-group input, .form-group select {
                font-size: 15px;
                padding: 10px 32px 10px 10px;
            }
            .register-btn {
                font-size: 15px;
                padding: 10px;
            }
        }
    </style>
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
    <script>
        // Username on key up: otomatis jadi huruf kapital
        function usernameKeyUp() {
            const usernameInput = document.getElementById('username');
            usernameInput.value = usernameInput.value.toUpperCase();
        }

        // Toggle password visibility
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            this.innerHTML = type === 'password' ? '&#128065;' : '&#128068;';
        });
    </script>
</body>
</html>