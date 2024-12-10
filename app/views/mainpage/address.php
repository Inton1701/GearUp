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
                <h2 class="section-title">Address</h2>
                <div class="mb-4 col-4">
                    <button class="address-btn" id="add-address-btn">
                        </i><b>Add Address</b>
                    </button>
                </div>
                <ul class="address-list">

                </ul>
            </div>
        </div>
        </div>

        <!-- Address Modal -->
        <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header border-secondary">
                        <h5 class="modal-title" id="addressModalLabel">Add Address</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-address-form">
                            <div class="form-group">
                                <label for="house_no">House No</label>
                                <input type="text" class="form-control bg-secondary text-white" id="house_no" name="house_no" required>
                            </div>
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control bg-secondary text-white" id="street" name="street" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control bg-secondary text-white" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="province">Province</label>
                                <input type="text" class="form-control bg-secondary text-white" id="province" name="province" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="save-address-btn">Save Address</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Popper.js (required for Bootstrap modals) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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

        // Show modal on button click
        $('#add-address-btn').click(function() {
            $('#addressModal').modal('show');
        });
    });

    $(document).ready(function() {
        // Show modal on button click
        $('#add-address-btn').click(function() {
            $('#addressModal').modal('show');
        });

        // Save address on modal submission
        $('#save-address-btn').click(function() {
            const addressData = {
                house_no: $('#house_no').val(),
                street: $('#street').val(),
                city: $('#city').val(),
                province: $('#province').val()
            };

            $.ajax({
                url: '/profile/add_address', // Backend endpoint for adding addresses
                method: 'POST',
                dataType: 'json',
                data: addressData,
                success: function(response) {
                    if (response.success) {
                        alert('Address added successfully!');
                        $('#addressModal').modal('hide');
                        location.reload(); // Refresh to show the updated address list
                    } else {
                        alert(response.message || 'Failed to add address.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error Details:', xhr.responseText); // Log response for debugging
                    alert('An error occurred while adding the address.');
                }
            });
        });
    });

    $(document).ready(function() {
        // Fetch and display all addresses
        function loadAddresses() {
            $.ajax({
                url: '/profile/get_user_addresses',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const addresses = response.data;
                        const addressList = $('.address-list');
                        addressList.empty(); // Clear existing addresses

                        addresses.forEach(function(address) {
                            const addressHTML = `
                            <li class="address-item">
                                <div class="address-details">
                                    <span><strong>House No:</strong> ${address.house_no}</span>
                                    <span><strong>Street:</strong> ${address.street}</span>
                                    <span><strong>City:</strong> ${address.City}</span>
                                    <span><strong>Province:</strong> ${address.Province}</span>
                                </div>
                            </li>
                        `;
                            addressList.append(addressHTML);
                        });
                    } else {
                        alert(response.message || 'No addresses found.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error Details:', xhr.responseText);
                    alert('An error occurred while fetching addresses.');
                }
            });
        }

        // Initial load
        loadAddresses();
    });
</script>



</html>