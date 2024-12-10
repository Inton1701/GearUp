<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include APP_DIR . 'views/templates/header.php'; ?>

  <title>Dashboard</title>

</head>
<style>

  td a {
    display: inline-block; /* Ensures truncation applies */
    max-width: 150px; /* Adjust as needed */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

</style>

<body>

  <?php include APP_DIR . 'views/templates/navbar.php'; ?>

  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="add-item d-flex">
          <div class="page-title">
            <h4>Order List</h4>
            <h6>Manage your orders</h6>
          </div>
        </div>
        <div class="page-btn">
          <a href="#" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i>Add New Order</a>
        </div>
      </div>
      <div class="card table-list-card">
        <div class="card-body">
          <div class="table-responsive product-list">
            <table class="table" id="table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Status</th>
                  <th>Payment Method</th>
                  <th>Total</th>
                  <th>User ID</th>
                  <th>User Email</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th class="no-sort sticky">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- loadProducts will load the table here dynamically -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- View Product Modal -->
  <div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewProductModalLabel">View Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="viewProductDetails">
            <!-- Product details will be dynamically loaded here -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Product Modal -->
  <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" enctype="multipart/form-data">
                    <input type="hidden" id="editProductId" name="product_id">
                    
                    <!-- Product Name and Price -->
                    <div class="row mb-3">
                    <div class="col-md-6">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" name="product_name" required>
                    </div>
                    <div class="col-md-6">
                            <label for="editProductName" class="form-label">Performance</label>
                            <select class="form-control" id="editProductPerformance" name="performance">
                                <option value="poor"selected>Poor</option>
                                <option value="low"> Low</option>
                                <option value="average">Average</option>
                                <option value="high">High</option>
                                <option value="best">Best</option>
                            </select>
                    </div>
                          </div>


                             <!-- Product Name and Price -->
                             <div class="row mb-3">
            
                        <div class="col-md-6">
                            <label for="editProductPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editProductPrice" name="price" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="editProductCost" class="form-label">Cost</label>
                            <input type="number" class="form-control" id="editProductCost" name="cost" required>
                        </div>
               
                    </div>
                    
                    <!-- Quantity and Quantity Alert -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editProductQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="editProductQuantity" name="quantity" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editQuantityAlert" class="form-label">Quantity Alert</label>
                            <input type="number" class="form-control" id="editQuantityAlert" name="quantity_alert" required>
                        </div>
                    </div>
                    
                    <!-- Category and Brand -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editProductCategory" class="form-label">Category</label>
                            <select class="form-control" id="editProductCategory" name="category">
                                <option value="" disabled selected>Select a category</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="editProductBrand" class="form-label">Brand</label>
                            <select class="form-control" id="editProductBrand" name="brand">
                                <option value="" disabled selected>Select a brand</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="editProductDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editProductDescription" name="product_description" rows="3" required></textarea>
                    </div>
                    
                    <!-- Product Image -->
                    <div class="mb-3">
                        <label for="editProductImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="editProductImage" name="product-image" accept=".jpg,.jpeg,.png,.gif">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


  <script>
    $(document).ready(function() {

const table = $('#table').DataTable({
  responsive: true,
  paging: true,
  searching: true,
  info: true
});

// Load Orders from the server
function loadOrders() {
  $.ajax({
    type: "GET",
    url: "<?= site_url('admin/order/list') ?>",  // Change to the orders list URL
    dataType: "json",
    success: function(response) {
      if (response.status === 'success') {
        const orders = response.data;
        // Clear the table before adding new data
            // Apply badge based on the status value

        table.clear();

        // Iterate through the orders and add rows to the DataTable
        orders.forEach(function(order) { 
            let statusBadge = '';
    if (order.status === 'pending') {
        statusBadge = '<span class="badge badge-warning">Pending</span>';
    } else if (order.status === 'shipped') {
        statusBadge = '<span class="badge badge-primary">Shipped</span>';
    } else if (order.status === 'delivered') {
        statusBadge = '<span class="badge badge-success">Delivered</span>';
    }
          table.row.add([
            order.order_id,
            statusBadge,
            order.payment_method,
            order.total_price,
            order.user_id,
            order.email,
            order.created_at,
            order.updated_at,
            ` 
            <div class="action-table-data">
              <div class="edit-delete-action">
                  <a href="#" class="me-2 view-icon p-2" data-id="${order.order_id}">
                      <i class="fa-regular fa-eye" style="color: #234785;"></i>
                  </a>
                  <a href="#" class="me-2 p-2 edit-icon" data-id="${order.order_id}">
                      <i data-feather="edit" class="feather-edit"></i>
                  </a>
                  <a href="#" class="confirm-text p-2 delete-icon" data-id="${order.order_id}">
                      <i data-feather="trash-2" class="feather-trash-2"></i>
                  </a>
              </div>
            </div>`
          ]).draw(false); // Redraw the table without resetting the pagination
        });

      } else {
        // Handle error
        Swal.fire({
          icon: 'error',
          title: 'Connection Error',
          text: response.message || 'Something went wrong'
        });
      }

    },
    error: function(xhr, status, error) {
      console.error('AJAX Error:', error);
      Swal.fire('Error', 'An error has occurred', 'error');
    }
  });
}

// Call the function to load orders
loadOrders();

$(document).on('click', '.view-icon', function() {
  const orderId = $(this).data('id');
  $.ajax({
    type: 'GET',
    url: `<?= site_url('admin/orders/get/') ?>${orderId}`,
    dataType: 'json',
    success: function(response) {
      if (response.status === 'success') {
        const order = response.data;
        $('#viewOrderDetails').html(`
          <p><strong>Status:</strong> ${order.status}</p>
          <p><strong>Payment Method:</strong> ${order.payment_method}</p>
          <p><strong>Total Price:</strong> $${order.total_price}</p>
          <p><strong>Created At:</strong> ${order.created_at}</p>
          <p><strong>Updated At:</strong> ${order.updated_at}</p>
        `);
        $('#viewOrderModal').modal('show');
      } else {
        Swal.fire('Error', response.message || 'Could not fetch order details', 'error');
      }
    },
    error: function(xhr, status, error) {
      console.error('AJAX Error:', error);
      Swal.fire('Error', 'An error has occurred', 'error');
    }
  });
});

// Handle Edit Order
$(document).on('click', '.edit-icon', function () {
  const orderId = $(this).data('id');
  $.ajax({
    type: 'GET',
    url: `<?= site_url('admin/orders/get/') ?>${orderId}`,
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const order = response.data;

        // Populate order details in the edit form
        $('#editOrderId').val(order.order_id);
        $('#editOrderStatus').val(order.status);
        $('#editPaymentMethod').val(order.payment_method);
        $('#editTotalPrice').val(order.total_price);
        $('#editCreatedAt').val(order.created_at);
        $('#editUpdatedAt').val(order.updated_at);

        // Show the modal
        $('#editOrderModal').modal('show');
      } else {
        Swal.fire('Error', response.message || 'Could not fetch order details', 'error');
      }
    },
    error: function(xhr, status, error) {
      console.error('AJAX Error:', error);
      Swal.fire('Error', 'An error has occurred', 'error');
    }
  });
});

// Handle Delete Order
$(document).on('click', '.delete-icon', function() {
  const orderId = $(this).data('id');
  Swal.fire({
    title: 'Are you sure?',
    text: 'Delete Order',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'Cancel'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'GET',
        url: `<?= site_url('admin/orders/delete/') ?>${orderId}`,
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            Swal.fire('Deleted!', 'The order has been deleted.', 'success');
            loadOrders();
          } else {
            Swal.fire('Error', response.message || 'Failed to delete order', 'error');
          }
        },
        error: function(xhr, status, error) {
          console.error('AJAX Error:', error);
          Swal.fire('Error', 'An error has occurred', 'error');
        }
      });
    }
  });
});
});
</script>

  <?php include APP_DIR . 'views/templates/footer.php'; ?>


</body>

</html>