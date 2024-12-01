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
                    <li><a href="#"><i class="fas fa-user"></i> My Account</a></li>
                    <li><a href="#"><i class="fas fa-shopping-bag"></i> My Orders</a></li>
                    <li><a href="#"><i class="fas fa-heart"></i> Wishlist</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Addresses</a></li>
                    <li><a href="#"><i class="fas fa-credit-card"></i> Payment Methods</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            <div class="main-content">
                <h2 class="section-title">Recent Orders</h2>
                <ul class="order-list">
                    <li class="order-item">
                        <h3>Order #12345</h3>
                        <div class="order-details">
                            <span>2 items</span>
                            <span>$150.00</span>
                            <span class="order-status">Delivered</span>
                        </div>
                    </li>
                    <li class="order-item">
                        <h3>Order #12344</h3>
                        <div class="order-details">
                            <span>1 item</span>
                            <span>$75.00</span>
                            <span class="order-status">Processing</span>
                        </div>
                    </li>
                    <li class="order-item">
                        <h3>Order #12343</h3>
                        <div class="order-details">
                            <span>3 items</span>
                            <span>$225.00</span>
                            <span class="order-status">Shipped</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>