<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/SignUp</title>
    <link rel="stylesheet" href="/auth/login.css">
    <link rel="stylesheet" href="/partials/loader.css">
    <link rel="stylesheet" href="/partials/errors.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="/signup.css"> --}}
</head>

<body>
    <!-- Loader Overlay -->
    <div id="global-loader"
        style="display: none;
position: fixed; top: 0; left: 0;
width: 100vw; height: 100vh;
background-color: rgba(255, 255, 255, 0.7);
z-index: 9999; display: flex; align-items: center; justify-content: center;">
        <div class="loader"></div>
    </div>

    <div class="main">
        @yield('content')
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('global-loader');
            const forms = document.querySelectorAll('form');

            if (!loader) {
                console.error('Loader element not found.');
                return;
            }

            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    loader.style.display = 'flex';
                });
            });
        });
    </script>
    <script>
        function checkPasswordStrength(password) {
            const strengthEl = document.getElementById('password-strength');
            if (password.length > 0) {
                strengthEl.style.display = 'block';
            } else {
                strengthEl.style.display = 'none';
                return;
            }
            strengthEl.innerHTML = '';

            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[@$!%*#?&]/.test(password)) strength++;

            const meter = document.createElement('div');
            meter.classList.add('password-strength-meter');

            if (strength <= 2) {
                meter.classList.add('weak');
            } else if (strength === 3) {
                meter.classList.add('medium');
            } else if (strength === 4) {
                meter.classList.add('strong');
            } else {
                meter.classList.add('very-strong');
            }

            strengthEl.appendChild(meter);
        }
    </script>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const icon = document.querySelector('.toggle-password');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.innerHTML = '<i class = "fa-solid fa-eye" > </i>';
            } else {
                passwordField.type = 'password';
                icon.innerHTML = '<i class = "fa-solid fa-eye-slash" > </i>';
            }
        }
    </script>
    <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_pass');
        const matchStatus = document.getElementById('password-match-status');

        function checkPasswordMatch() {
            if (confirmPasswordInput.value === "") {
                matchStatus.textContent = "";
                return;
            }

            if (passwordInput.value === confirmPasswordInput.value) {
                matchStatus.innerHTML = '<span style="color: green;">✔ Passwords match</span>';
            } else {
                matchStatus.innerHTML = '<span style="color: red;">✖ Passwords do not match</span>';
            }
        }

        passwordInput.addEventListener('input', checkPasswordMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
    </script>


</body>

</html>
