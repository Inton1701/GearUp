<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - User Profile</title>
    <?php include APP_DIR . 'views/templates/mainheader.php'; ?>
</head>

<body>
    <?php include APP_DIR . 'views/templates/main_nav.php'; ?>

    <main class="container">
        <div class="profile-header mt-3">
            <img src="https://via.placeholder.com/100" alt="Profile Picture" class="profile-picture">
            <div class="profile-info">
                <div class="name d-flex align-items-center justify-content-left">
                    <h1 id="first-name"></h1>
                    <h1 id="last-name"></h1>
                </div>
            </div>
        </div>

        <div class="profile-content">
            <div class="sidebar">
                <ul class="sidebar-menu">
                    <li><a href="/profile"><i class="fas fa-user"></i> My Account</a></li>
                    <li><a href="/order"><i class="fas fa-shopping-bag"></i> My Orders</a></li>
                    <li><a href="/wishlist"><i class="fas fa-heart"></i> Wishlist</a></li>
                    <li><a href="/address"><i class="fas fa-map-marker-alt"></i> Addresses</a></li>
                </ul>
            </div>
            <div class="main-content">
                <h2 class="section-title">My Profile</h2>
                <p class="subtitle">Manage and protect your account</p>

                <div class="avatar-section mb-3">
                    <div class="avatar-placeholder">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture">
                    </div>
                    <button class="select-image-button">Select Image</button>
                </div>

                <div class="profile-form">
                    <div class="form-content">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="email-group">
                                <span id="email"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Contact</label>
                            <div class="contact-group">
                                <span id="contact"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="dob-group">
                                <span id="birthdate"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>
<script>
    $(document).ready(function() {
        // Fetch user profile data
        $.ajax({
            url: '/profile/get_user_data',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    const user = response.data;
                    $('#first-name').text(user.first_name);
                    $('#last-name').text(user.last_name);
                    $('#email').text(user.email);
                    $('#contact').text(user.contact); // Corrected field for address
                    $('#birthdate').text(new Date(user.birthdate).toLocaleDateString());
                } else {
                    alert(response.message || 'Failed to fetch user data.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error Details:', xhr.responseText); // Log response for debugging
                alert('An error occurred while fetching user data.');
            }
        });
    });
</script>



</html>