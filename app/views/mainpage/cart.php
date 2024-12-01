<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <link rel="stylesheet" href="<?= base_url(); ?>public/maincss/cart.css" />
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
                                    <button class="quantity-btn">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1">
                                    <button class="quantity-btn">+</button>
                                </div>
                            </td>
                            <td>$67.00</td>
                            <td><button class="remove-btn">×</button></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="https://via.placeholder.com/60" alt="Gaming Keyboard">
                                    <span>Gaming Keyboard</span>
                                </div>
                            </td>
                            <td>$50.00</td>
                            <td>
                                <div class="quantity-control">
                                    <button class="quantity-btn">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1">
                                    <button class="quantity-btn">+</button>
                                </div>
                            </td>
                            <td>$50.00</td>
                            <td><button class="remove-btn">×</button></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="https://via.placeholder.com/60" alt="Gaming Headphones">
                                    <span>Gaming Headphones</span>
                                </div>
                            </td>
                            <td>$49.00</td>
                            <td>
                                <div class="quantity-control">
                                    <button class="quantity-btn">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1">
                                    <button class="quantity-btn">+</button>
                                </div>
                            </td>
                            <td>$49.00</td>
                            <td><button class="remove-btn">×</button></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="https://via.placeholder.com/60" alt="Gamepad Game Controller">
                                    <span>Gamepad Game Controller</span>
                                </div>
                            </td>
                            <td>$20.00</td>
                            <td>
                                <div class="quantity-control">
                                    <button class="quantity-btn">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1">
                                    <button class="quantity-btn">+</button>
                                </div>
                            </td>
                            <td>$20.00</td>
                            <td><button class="remove-btn">×</button></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="https://via.placeholder.com/60" alt="AeroBoost Laptop Stand">
                                    <span>AeroBoost Laptop Stand</span>
                                </div>
                            </td>
                            <td>$79.00</td>
                            <td>
                                <div class="quantity-control">
                                    <button class="quantity-btn">-</button>
                                    <input type="number" class="quantity-input" value="1" min="1">
                                    <button class="quantity-btn">+</button>
                                </div>
                            </td>
                            <td>$79.00</td>
                            <td><button class="remove-btn">×</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="cart-actions">
                <button class="update-cart">Update Cart</button>
                <button class="continue-shopping">Continue Shopping</button>
            </div>

            <div class="cart-totals">
                <h2>Cart Totals</h2>
                <div class="total-row">
                    <span>Total</span>
                    <span>$265.00</span>
                </div>
                <button class="checkout-btn">Proceed to Checkout</button>
            </div>
        </div>
    </main>
</body>

</html>