<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - User Profile</title>
    <?php include APP_DIR . 'views/templates/authheader.php'; ?>
</head>

<body>
    <main>
        <div class="container">
            <div class="logo">Gear<span>UP</span></div>
            <h5>Login to Your Account</h5>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Login</button>
            </form>
            <div class="forgot-password">
                <a href="#">Forgot your password?</a>
            </div>
            <div class="social-login">
                <p>Or login with</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="signup-link">
                Don't have an account? <a href="#">Sign up</a>
            </div>
        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>