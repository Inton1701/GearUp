<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <link rel="stylesheet" href="<?= base_url(); ?>public/maincss/mainpage.css" />
</head>
<body>
<?php include APP_DIR.'views/templates/main_nav.php';?>
    <main>
        <div class="container">
            <h1>Products</h1>
            <div class="breadcrumb">
                <a href="#">Home</a> / <span class="active">Products</span>
            </div>

            <div class="product-grid">
                <!-- Product cards (6 shown for brevity, but you can add more) -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/200" alt="AeroBoost Laptop Stand">
                    </div>
                    <button class="wishlist" aria-label="Add to wishlist">♡</button>
                    <div class="product-details">
                        <h2 class="product-title">AeroBoost Laptop Stand</h2>
                        <p class="product-price">$79.00</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/200" alt="BlazeStorm Cooling Fan">
                    </div>
                    <button class="wishlist" aria-label="Add to wishlist">♡</button>
                    <div class="product-details">
                        <h2 class="product-title">BlazeStorm Cooling Fan</h2>
                        <p class="product-price">$9.00</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/200" alt="Gamepad Game Controller">
                    </div>
                    <button class="wishlist" aria-label="Add to wishlist">♡</button>
                    <div class="product-details">
                        <h2 class="product-title">Gamepad Game Controller</h2>
                        <p class="product-price">$20.00</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/200" alt="Gaming Headphones">
                    </div>
                    <button class="wishlist" aria-label="Add to wishlist">♡</button>
                    <span class="sale-badge">Sale</span>
                    <div class="product-details">
                        <h2 class="product-title">Gaming Headphones</h2>
                        <p class="product-price">$49.00 <span class="original-price">$75.00</span></p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/200" alt="Gaming Keyboard">
                    </div>
                    <button class="wishlist" aria-label="Add to wishlist">♡</button>
                    <span class="sale-badge">Sale</span>
                    <div class="product-details">
                        <h2 class="product-title">Gaming Keyboard</h2>
                        <p class="product-price">$50.00 <span class="original-price">$65.00</span></p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/200" alt="Hyper Vibe RGB Headset">
                    </div>
                    <button class="wishlist" aria-label="Add to wishlist">♡</button>
                    <div class="product-details">
                        <h2 class="product-title">Hyper Vibe RGB Headset</h2>
                        <p class="product-price">$67.00</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="disabled">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
    </main>
</body>
</html>