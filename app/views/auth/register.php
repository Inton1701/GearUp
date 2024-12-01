<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Add User</title>
    <?php include APP_DIR . 'views/templates/authheader.php'; ?>
</head>

<body>
    <main class="reg">
        <div class="container">
            <div class="logo fs-2">Gear<span>UP</span></div>
            <h6>Create an Account</h6>
            <form action="#" method="POST">
                <div class="avatar-upload">
                    <div class="avatar-placeholder">
                        <span>Profile Photo</span>
                    </div>
                    <button type="button" class="change-image-btn">Change Image</button>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" id="phone" name="phone" placeholder="Phone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <div class="password-input">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                            <button type="button" class="toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="password-input">
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Password" required>
                            <button type="button" class="toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Register</button>
                <div class="signup-link">
                    Already have an account? <a href="/login">Login</a>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });

        // Character count for description
        const descriptionTextarea = document.getElementById('description');
        const charCount = document.querySelector('.char-count');

        descriptionTextarea.addEventListener('input', function() {
            const remaining = 600 - this.value.length;
            charCount.textContent = `${remaining} characters remaining`;
        });
    </script>
</body>

</html>