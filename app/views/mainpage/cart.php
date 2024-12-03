<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <link rel="stylesheet" href="<?= base_url(); ?>public/maincss/cart.css" />
    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
</head>

<body>
    <?php include APP_DIR . 'views/templates/main_nav.php'; ?>
    <main>
        <div class="container">
            <h1>Your Shopping Cart</h1>
            <div class="breadcrumb">
                <a href="#">Home</a> / <span class="active">Your Shopping Cart</span>
            </div>

            <div class="cart-table">
                <table>
                    <thead>
                        <tr>
                            <th>PRODUCT NAME</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="https://via.placeholder.com/60" alt="HyperVibe RGB Headset">
                                    <span>HyperVibe RGB Headset</span>
                                </div>
                            </td>
                            <td>$67.00</td>
                            <td>
                                <div class="quantity-control">
                                    <button class="quantity-btn"><i class="bi bi-dash"></i></button>
                                    <input type="number" class="quantity-input" value="1" min="1">
                                    <button class="quantity-btn"><i class="bi bi-plus"></i></button>
                                </div>
                            </td>
                            <td>$67.00</td>
                            <td><button class="remove-btn"><i class="bi bi-x-lg"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="checkout-bar">
                <div class="shipping-info">
                    <span class="shipping-label">Shipping</span>
                    <span class="shipping-method">Standard Delivery</span>
                </div>
                <div class="subtotal-section">
                    <span class="subtotal">Subtotal: ₱0.00</span>
                    <span class="payment-info">
                        Available payment methods
                        <a href="#">Learn More</a>
                    </span>
                </div>
                <button class="add-to-cart-btn">
                    <i class="fas fa-shopping-cart cart-icon"></i>
                    CHECKOUT
                </button>
            </div>

        </div>
    </main>
</body>

</html>