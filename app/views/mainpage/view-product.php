<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>public/maincss/view.css" />
    <title>Product</title>
</head>
<body>
<?php include APP_DIR . 'views/templates/main_nav.php'; ?>
<div class="breadcrumb">
        <a href="/">Home</a> > BlazeStorm Cooling Fan
    </div>

    <main class="product-container">
        <div class="product-gallery">
            <img src="https://placehold.co/500x500" alt="BlazeStorm Cooling Fan" class="main-image">
            <div class="thumbnail-container">
                <img src="https://placehold.co/80x80" alt="Thumbnail 1" class="thumbnail">
            </div>
        </div>

        <div class="product-info">
            <h1>BlazeStorm Cooling Fan</h1>
            <div class="price">$29.99 USD</div>
            <div class="stock-status">
                🔥 HURRY! ONLY 7 LEFT IN STOCK
            </div>
            <div class="quantity-selector">
                <input type="number" value="1" min="1" class="quantity-input">
            </div>
            <button class="add-to-cart">ADD TO CART</button>
        </div>
    </main>

    <section class="tabs">
        <div class="tab-buttons">
            <button class="tab-button active">DESCRIPTION</button>
        </div>
        <div class="tab-content">
            <p>Lorem ipsum dolor sit amet consectetur. Egestas leo a ornare risus leo ultricorper neque dictum arcu. At vel porta ut eget non risus nulla.</p>
        </div>
    </section>

    <section class="related-products">
        <h2>Related Products</h2>
        <div class="products-grid">
            <div class="product-card">
                <button class="wishlist-button">♡</button>
                <img src="https://placehold.co/200x200" alt="SteelGuard Wrist Rest">
                <h3>SteelGuard Wrist Rest</h3>
            </div>
            <div class="product-card">
                <button class="wishlist-button">♡</button>
                <img src="https://placehold.co/200x200" alt="RazorFire Thumb Grips">
                <h3>RazorFire Thumb Grips</h3>
            </div>
            <div class="product-card">
                <button class="wishlist-button">♡</button>
                <img src="https://placehold.co/200x200" alt="HyperVibe RGB Headset">
                <h3>HyperVibe RGB Headset</h3>
            </div>
        </div>
    </section>
</body>
</html>