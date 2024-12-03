<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Add User</title>
    <?php include APP_DIR . 'views/templates/authheader.php'; ?>
</head>
<style>
    .avatar-placeholder {
        position: relative;
        display: inline-block;
    }

    .avatar-placeholder img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        display: none;
    }

    .avatar-placeholder .remove-photo {
        position: absolute;
        top: 5px;
        right: 5px;
        background: none;
        border: none;
        color: red;
        font-size: 18px;
        cursor: pointer;
        display: none;
    }

    .image-upload button {
        margin-top: 10px;
    }
</style>

<body>
    <main class="reg">
        <div class="container">
            <div class="logo fs-2">Gear<span>UP</span></div>
            <h6>Create an Account</h6>
            <form id="registerUserFrom" enctype="multipart/form-data">
                <div class="avatar-upload">
                    <div class="avatar-placeholder">
                        <span id="pic-placeholder">Profile Photo</span>
                        <!-- Image preview will be placed here -->
                        <img id="profile-pic" src="" alt="Profile Image" />
                        <!-- "X" icon to remove the photo -->
                        <button type="button" id="remove-photo" class="remove-photo">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="image-upload mb-0">
                        <button type="button" class="change-image-btn">Select</button>
                        <!-- Hidden file input -->
                        <input type="file" id="add-user-logo" name="user_profile" style="display: none;" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="email" id="add-email" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="date" id="birthdate" name="birthdate" placeholder="Birthdate" required />
                    </div>
                    <div class="form-group">
                        <input type="tel" id="contact" name="contact" placeholder="contact" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <div class="password-input">
                            <input type="password" id="add-password" name="password" placeholder="Password" required>
                            <button type="button" class="toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="password-input">
                            <input type="password" id="add-conf-password" name="confirm-password" placeholder="Password" required>
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

    <script src="<?= base_url(); ?>public/assets/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
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

            // Character count for description (optional, only needed if description field exists)
            const descriptionTextarea = document.getElementById('description');
            const charCount = document.querySelector('.char-count');

            if (descriptionTextarea) { // Only add event listener if description textarea exists
                descriptionTextarea.addEventListener('input', function() {
                    const remaining = 600 - this.value.length;
                    charCount.textContent = `${remaining} characters remaining`;
                });
            }
            $('#registerUserFrom').on('submit', function(e) {
                e.preventDefault();
                const formElement = this; // Store the form element

                let formData = new FormData(formElement);
                $.ajax({
                    type: 'POST',
                    url: "<?= site_url('user/check_email/') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Retrieve form fields
                            const password = $('#add-password').val();
                            const confirmPassword = $('#add-conf-password').val();

                            // Password validation
                            if (!password) {
                                Swal.fire('Error', 'Password cannot be empty.', 'error');
                                return; // Stop submission
                            }

                            if (password.length < 8) {
                                Swal.fire('Error', 'Password must be at least 8 characters long.', 'error');
                                return; // Stop submission
                            }

                            if (!/[A-Z]/.test(password)) {
                                Swal.fire('Error', 'Password must contain at least one uppercase letter.', 'error');
                                return; // Stop submission
                            }

                            if (!/[a-z]/.test(password)) {
                                Swal.fire('Error', 'Password must contain at least one lowercase letter.', 'error');
                                return; // Stop submission
                            }

                            if (!/[0-9]/.test(password)) {
                                Swal.fire('Error', 'Password must contain at least one number.', 'error');
                                return; // Stop submission
                            }

                            if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                                Swal.fire('Error', 'Password must contain at least one special character.', 'error');
                                return; // Stop submission
                            }

                            if (password !== confirmPassword) {
                                Swal.fire('Error', 'Passwords do not match.', 'error');
                                return; // Stop submission
                            }

                            // Use the stored form element here
                            let formData = new FormData(formElement);
                            $.ajax({
                                url: "<?= site_url('user/register'); ?>", // Ensure the URL is correct
                                type: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                dataType: "json",
                                success: function(response) {
                                    if (response.status === 'success') {
                                        Swal.fire({
                                            title: 'Success',
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'Go to Login'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Redirect to login page
                                                window.location.href = '/login';
                                            }
                                        });
                                    } else {
                                        Swal.fire('Error', response.message, 'error');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error:', error);
                                    console.error('Status:', status);
                                    console.error('Response:', xhr.responseText);
                                    Swal.fire('Error', 'An error has occurred', 'error');
                                }
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Could not fetch user details', 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.error('Status:', status);
                        console.error('Response:', xhr.responseText);
                        Swal.fire('Error', 'An error has occurred', 'error');
                    }
                });


                ////////////////////////////////////////////////////////////////////


            });

            $(".change-image-btn").on("click", function() {
                $("#add-user-logo").trigger("click"); // Trigger the file input click
            });

            // Handle the image preview
            $("#add-user-logo").on("change", function(event) {
                const input = event.target;
                const file = input.files[0];

                if (file) {
                    // Check if the file is an image
                    if (file.type.startsWith("image/")) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            // Set the image preview
                            $("#profile-pic").attr("src", e.target.result).show();
                            $("#pic-placeholder").hide();
                            $("#remove-photo").show(); // Show the remove button
                        };

                        reader.readAsDataURL(file);
                    } else {
                        Swal.fire("Invalid File", "Please upload a valid image file.", "error");
                        $(input).val(""); // Reset the file input if it's not an image
                    }
                }
            });

            // Handle remove photo functionality
            $("#remove-photo").on("click", function() {
                $("#profile-pic").attr("src", "").hide(); // Hide the preview
                $("#add-user-logo").val(""); // Clear the file input
                $(this).hide(); // Hide the remove button
                $("#pic-placeholder").show();
            });

            // Handle form submission (same as before)
            $('#registerUserFrom').on('submit', function(e) {
                e.preventDefault();
                // Password validation and form submission logic...
            });


        });
    </script>



</body>

</html>