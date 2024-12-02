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
                    <h1>John Doe</h1>
                </div>
                <div class="profile-stats">
                    <div class="stat">
                        <div class="stat-value">25</div>
                        <div class="stat-label">Orders</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">4.8</div>
                        <div class="stat-label">Rating</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">$1,250</div>
                        <div class="stat-label">Total Spent</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-content">
            <div class="sidebar">
                <ul class="sidebar-menu">
                    <li><a href="/profile"><i class="fas fa-user"></i> My Account</a></li>
                    <li><a href="/order"><i class="fas fa-shopping-bag"></i> My Orders</a></li>
                    <li><a href="#"><i class="fas fa-heart"></i> Wishlist</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Addresses</a></li>
                    <li><a href="#"><i class="fas fa-credit-card"></i> Payment Methods</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            <div class="main-content">
    <h2 class="section-title">My Profile</h2>
    <p class="subtitle">Manage and protect your account</p>
    
    <div class="profile-form">
        <div class="form-content">
            <div class="form-group">
                <label>Username</label>
                <input type="text" value="warendilay" disabled>
                <span class="help-text">Username can only be changed once.</span>
            </div>
            
            <div class="form-group">
                <label>Name</label>
                <input type="text">
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <div class="email-group">
                    <span>dj***********@gmail.com</span>
                    <a href="#" class="change-link">Change</a>
                </div>
            </div>
            
            <div class="form-group">
                <label>Phone Number</label>
                <div class="phone-group">
                    <span>*********11</span>
                    <a href="#" class="change-link">Change</a>
                </div>
            </div>
            
            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <label class="radio-label">
                        <input type="radio" name="gender" value="male">
                        <span>Male</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="gender" value="female">
                        <span>Female</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="gender" value="other">
                        <span>Other</span>
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label>Date of birth</label>
                <div class="date-group">
                    <select class="date-select">
                        <option>Date</option>
                    </select>
                    <select class="date-select">
                        <option>Month</option>
                    </select>
                    <select class="date-select">
                        <option>Year</option>
                    </select>
                </div>
            </div>
            
            <button class="save-button">Save</button>
        </div>
        
        <div class="avatar-section">
            <div class="avatar-placeholder">
                <img src="https://via.placeholder.com/150" alt="Profile Picture">
            </div>
            <button class="select-image-button">Select Image</button>
            <p class="file-info">File size: maximum 1 MB</p>
            <p class="file-info">File extension: .JPEG, .PNG</p>
        </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>