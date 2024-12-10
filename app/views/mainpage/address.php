<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUP - User Profile</title>
    <?php include APP_DIR . 'views/templates/mainheader.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                            <li class="address-item d-flex justify-content-between align-items-center">
                                <div class="address-details">
                                    <span><strong>House No:</strong> ${address.house_no}</span>
                                    <span><strong>Street:</strong> ${address.street}</span>
                                    <span><strong>City:</strong> ${address.City}</span>
                                    <span><strong>Province:</strong> ${address.Province}</span>
                                </div>
                                <button class="btn btn-danger btn-sm delete-address" data-id="${address.address_id}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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

        // Add address success message with SweetAlert
        $('#save-address-btn').click(function() {
            const addressData = {
                house_no: $('#house_no').val(),
                street: $('#street').val(),
                city: $('#city').val(),
                province: $('#province').val()
            };

            $.ajax({
                url: '/profile/add_address',
                method: 'POST',
                dataType: 'json',
                data: addressData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Address added successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            $('#addressModal').modal('hide');
                            loadAddresses(); // Reload addresses
                        });
                    } else {
                        Swal.fire('Error', response.message || 'Failed to add address.', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error Details:', xhr.responseText);
                    Swal.fire('Error', 'An error occurred while adding the address.', 'error');
                }
            });
        });

        $(document).on('click', '.delete-address', function() {
            const addressId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this address!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/profile/delete_address',
                        method: 'POST',
                        data: {
                            address_id: addressId
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your address has been deleted.',
                                    'success'
                                );
                                loadAddresses(); // Reload the addresses
                            } else {
                                Swal.fire('Error', response.message || 'Failed to delete address.', 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error Details:', xhr.responseText);
                            Swal.fire('Error', 'An error occurred while deleting the address.', 'error');
                        }
                    });
                }
            });
        });


        // Initial load
        loadAddresses();
    });
</script>

</html>