
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

        // Tampilkan alert jika ada error dari URL
        window.onload = function() {
            const params = new URLSearchParams(window.location.search);
            if (params.get('error') === 'invalid') {
                alert('Username atau password salah!');
            } else if (params.get('error') === 'empty') {
                alert('Username dan password harus diisi!');
            } else if (params.get('error') === 'role') {
                alert('Role tidak dikenali!');
            } else if (params.get('success') === 'register') {
                alert('Registrasi berhasil! Silakan login.');
            }
        };

        // Loading animation on login, lalu submit ke cek_login.php
        const loginForm = document.getElementById('loginForm');
        const loginBtn = document.getElementById('loginBtn');
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            loginBtn.classList.add('loading');
            loginBtn.disabled = true;
            setTimeout(() => {
                loginForm.submit(); // submit form ke cek_login.php setelah 1 detik
            }, 1000);
        });