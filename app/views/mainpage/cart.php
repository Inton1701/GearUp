<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - Shop</title>
    <?php include APP_DIR . 'views/templates/mainheader.php'; ?>
    <link rel="stylesheet" href="<?= base_url(); ?>public/maincss/cart.css" />
    <script src="<?= base_url(); ?>public/assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
                        <!-- Products will be loaded here dynamically -->
                    </tbody>
                </table>
            </div>

            <!-- Checkout Modal -->
            <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Address Selection -->
                            <h6>Select Address</h6>
                            <div id="addressList">
                                <!-- Addresses will be dynamically loaded here -->
                            </div>

                            <hr>

                            <!-- Cart Summary -->
                            <h6>Review Your Cart</h6>
                            <div id="checkoutCartItems">
                                <!-- Cart items will be dynamically loaded here -->
                            </div>

                            <div class="text-end mt-3">
                                <h5>Total: <span id="checkoutTotal">₱0.00</span></h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="confirmCheckoutBtn">Confirm Checkout</button>
                        </div>
                    </div>
                </div>
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Popper.js (required for Bootstrap modals) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Function to load cart items
    function loadCartItems() {
        $.ajax({
            url: '<?= site_url("cart") ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const cartItems = response.data;
                    const cartTableBody = $('tbody');
                    cartTableBody.empty();

                    let subtotal = 0;

                    cartItems.forEach(item => {
                        subtotal += parseFloat(item.total_price);

                        const row = `
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="<?= base_url(); ?>public/userdata/img/${item.image_path}" alt="${item.product_name}">
                                        <span>${item.product_name}</span>
                                    </div>
                                </td>
                                <td>₱${parseFloat(item.price).toFixed(2)}</td>
                                <td>
                                    <div class="quantity-control">
                                        <button class="quantity-btn decrease" data-id="${item.product_id}">-</button>
                                        <input type="number" class="quantity-input" value="${item.quantity}" min="1" step="1" data-id="${item.product_id}">
                                        <button class="quantity-btn increase" data-id="${item.product_id}">+</button>
                                    </div>
                                </td>
                                <td>₱${parseFloat(item.total_price).toFixed(2)}</td>
                                <td><button class="remove-btn" data-id="${item.product_id}">X</button></td>
                            </tr>
                        `;
                        cartTableBody.append(row);
                    });

                    $('.subtotal').text(`Subtotal: ₱${subtotal.toFixed(2)}`);
                } else {
                    $('tbody').html('<tr><td colspan="5" class="text-center">Your cart is empty.</td></tr>');
                    $('.subtotal').text('Subtotal: ₱0.00');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading cart:', xhr.responseText);
            }
        });
    }

    // Function to update cart quantity
    function updateCartQuantity(productId, quantity) {
        const parsedQuantity = parseInt(quantity, 10);

        if (isNaN(parsedQuantity) || parsedQuantity < 1) {
            console.error("Invalid quantity value");
            return;
        }

        $.ajax({
            url: '<?= site_url("cart/update") ?>',
            type: 'POST',
            data: {
                product_id: productId,
                quantity: parsedQuantity
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    loadCartItems(); // Refresh cart items
                } else {
                    console.error('Error updating cart:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', xhr.responseText);
            }
        });
    }

    // Function to remove cart item with SweetAlert confirmation
    function removeCartItem(productId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to undo this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= site_url("cart/remove") ?>',
                    type: 'POST',
                    data: {
                        product_id: productId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            loadCartItems(); // Refresh cart items
                            Swal.fire('Removed!', response.message, 'success');
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Failed to remove the item. Please try again later.', 'error');
                    }
                });
            }
        });
    }

    // Event: Quantity button click
    $(document).on('click', '.quantity-btn', function() {
        const button = $(this);
        const input = button.siblings('.quantity-input');
        const productId = input.data('id');
        let quantity = parseInt(input.val());

        if (button.hasClass('increase')) {
            quantity += 1;
        } else if (button.hasClass('decrease') && quantity > 1) {
            quantity -= 1;
        }

        input.val(quantity);

        if (productId !== undefined) {
            updateCartQuantity(productId, quantity);
        } else {
            console.error("Product ID is undefined!");
        }
    });

    // Event: Manual quantity input change
    $(document).on('change', '.quantity-input', function() {
        const input = $(this);
        const productId = input.data('id');
        let quantity = parseInt(input.val());

        if (quantity < 1 || isNaN(quantity)) {
            quantity = 1; // Default to 1 if invalid
            input.val(quantity);
        }

        updateCartQuantity(productId, quantity);
    });

    // Event: Remove button click
    $(document).on('click', '.remove-btn', function() {
        const productId = $(this).data('id');
        removeCartItem(productId);
    });

    // Initial cart load
    $(document).ready(function() {
        loadCartItems();
    });

    // Open Checkout Modal
    $(document).on('click', '.add-to-cart-btn', function() {
        $('#checkoutModal').modal('show');
        loadCheckoutDetails(); // Load cart items and addresses
    });

    // Function to load checkout details
    function loadCheckoutDetails() {
        // Load addresses
        $.ajax({
            url: '<?= site_url("checkout/addresses") ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    let addresses = response.data;
                    let addressHTML = '';
                    addresses.forEach(address => {
                        addressHTML += `
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="selectedAddress" id="address-${address.address_id}" value="${address.address_id}">
                            <label class="form-check-label" for="address-${address.address_id}">
                                ${address.house_no}, ${address.street}, ${address.City}, ${address.Province}
                            </label>
                        </div>`;
                    });
                    $('#addressList').html(addressHTML);
                } else {
                    $('#addressList').html('<p class="text-danger">No saved addresses found. Add one first!</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading addresses:', xhr.responseText);
            }
        });

        // Load cart items
        $.ajax({
            url: '<?= site_url("cart") ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    let cartItems = response.data;
                    let cartHTML = '';
                    let total = 0;
                    cartItems.forEach(item => {
                        total += parseFloat(item.total_price);
                        cartHTML += `
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <strong>${item.product_name}</strong><br>
                                <small>₱${parseFloat(item.price).toFixed(2)} x ${item.quantity}</small>
                            </div>
                            <div>
                                ₱${parseFloat(item.total_price).toFixed(2)}
                                <button class="btn btn-sm btn-danger ms-2 remove-checkout-item" data-id="${item.product_id}">
                                    Remove
                                </button>
                            </div>
                        </div>`;
                    });
                    $('#checkoutCartItems').html(cartHTML);
                    $('#checkoutTotal').text(`₱${total.toFixed(2)}`);
                } else {
                    $('#checkoutCartItems').html('<p class="text-danger">No items in the cart to checkout.</p>');
                    $('#checkoutTotal').text('₱0.00');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading checkout cart:', xhr.responseText);
            }
        });
    }

    // Remove an item from checkout (doesn't update the main cart)
    $(document).on('click', '.remove-checkout-item', function() {
        $(this).closest('div').remove();
        // Recompute total
        let total = 0;
        $('#checkoutCartItems .d-flex').each(function() {
            let itemTotal = parseFloat($(this).find('div:last-child').text().replace('₱', ''));
            total += itemTotal;
        });
        $('#checkoutTotal').text(`₱${total.toFixed(2)}`);
    });

    $(document).on('click', '#confirmCheckoutBtn', function() {
        const addressId = $('input[name="selectedAddress"]:checked').val();
        if (!addressId) {
            Swal.fire('Error', 'Please select an address.', 'error');
            return;
        }

        const cartItems = [];
        $('#checkoutCartItems .d-flex').each(function() {
            const productId = $(this).find('.remove-checkout-item').data('id');
            const quantity = parseInt($(this).find('small').text().match(/\d+/)[0]);
            const price = parseFloat($(this).find('small').text().match(/₱([\d.]+)/)[1]);
            cartItems.push({
                product_id: productId,
                quantity,
                price
            });
        });

        if (cartItems.length === 0) {
            Swal.fire('Error', 'No items in the cart to checkout.', 'error');
            return;
        }

        $.ajax({
            url: '<?= site_url("checkout/confirm") ?>',
            type: 'POST',
            data: {
                address_id: addressId,
                cart_items: JSON.stringify(cartItems), // Properly encode the array
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire('Success', response.message, 'success').then(() => {
                        location.reload(); // Reload or redirect after success
                    });
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function(xhr, status, error) {
                Swal.fire('Error', 'Failed to complete checkout.', 'error');
            }
        });
    });
</script>

</html>