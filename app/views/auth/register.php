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
            <div class="logo fs-2">Gear<span>UP</span></div>
            <h6>Create an Account</h6>
            <form action="#" method="POST">
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="submit-btn">Register</button>
            </form>
            <!-- <div class="social-login">
                <p>Or login with</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div> -->
            <div class="signup-link">
                Already have an account? <a href="/login">Login</a>
            </div>
        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>