
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
