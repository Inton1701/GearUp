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
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?= $error; ?></div>
            <?php endif; ?>

            <div class="logo fs-2">Gear<span>UP</span></div>
            <h6>Login to Your Account</h6>
            <form id="logUserForm">
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group password-input">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                <button type="submit" class="submit-btn">Login</button>
            </form>
            <div class="forgot-password">
                <a href="#">Forgot your password?</a>
            </div>
            <!-- <div class="social-login">
                <p>Or login with</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div> -->
            <div class="signup-link">
                Don't have an account? <a href="/register">Sign up</a>
            </div>
        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="<?= base_url(); ?>public/assets/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector(".toggle-password");
            const passwordInput = document.getElementById("password");

            togglePassword.addEventListener("click", function() {
                // Toggle the type attribute
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);

                // Toggle the icon
                this.querySelector("i").classList.toggle("fa-eye");
                this.querySelector("i").classList.toggle("fa-eye-slash");
            });
        });
        $(document).ready(function() {
        $('#logUserForm').on('submit', function(e) {
        e.preventDefault();

        // Retrieve form fields
     
        let formData = new FormData(this);
        $.ajax({
          url: "<?= site_url('user/verify'); ?>",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function(response) {
            if (response.status === 'success') {
                window.location.href = '/home';
            }else{
                Swal.fire('Error',response.message,'error');
            }
          },
          error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error');
          }
        });
      });
    });
    </script>


</body>

</html>