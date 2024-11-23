<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include APP_DIR.'views/templates/header.php';?>

    <title>Dashboard</title>
    
</head>

<body>

<?php include APP_DIR.'views/templates/navbar.php';?>

<div class="page-wrapper">
        <div class="content">
          <div class="page-header">
            <div class="add-item d-flex">
              <div class="page-title">
                <h4>Product List</h4>
                <h6>Manage your products</h6>
              </div>
            </div>
            <div class="page-btn">
              <a href="/admin/add-products" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i>Add New Product</a>
            </div>
          </div>
          <div class="card table-list-card">
            <div class="card-body">
              <div class="table-responsive product-list">
                <table class="table" id="table" >
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Solds</th>
                      <th>Returns</th>
                      <th>Updated On</th>
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
        <form id="editProductForm">
          <input type="hidden" id="editProductId" name="product_id">
          <div class="mb-3">
            <label for="editProductName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="editProductName" name="product_name" required>
          </div>
          <div class="mb-3">
            <label for="editProductPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="editProductPrice" name="price" required>
          </div>
          <div class="mb-3">
            <label for="editProductQuantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="editProductQuantity" name="quantity" required>
          </div>
          <!-- Add more fields as necessary -->
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
      <script>
 $(document).ready(function() {
  // Initialize DataTable and store it in the 'table' variable
  const table = $('#table').DataTable({
    responsive: true,
    paging: true,
    searching: true,
    info: true
  });

  // Load Products from the server
  function loadProducts(){
    $.ajax({
      type: "GET",
      url: "<?=site_url('admin/products/products_list')?>", // Make sure this URL is correct
      dataType: "json",
      success: function(response){
        if(response.status === 'success'){
          const products = response.data;
          // Clear the table before adding new data
          table.clear();
          
          // Iterate through the products and add rows to the DataTable
          products.forEach(function(product) { // Fix the forEach function
            console.log(product.product_id);
            table.row.add([
              product.product_id,
              `
                <div class="productimgname">
                  <a href="javascript:void(0);" class="product-img stock-img">
                    <img src="<?= base_url(); ?>public/userdata/img/${product.image_path}"/>
                  </a>
                  <a href="javascript:void(0);">${product.product_name}</a>
                </div>
              `,
              product.category_name,
              product.brand_name,
              product.price,
              product.quantity,
              product.solds,
              product.returns,
              product.updated_at,
              `
                       <div class="action-table-data">
            <div class="edit-delete-action">
                <a href="#" class="me-2 view-icon p-2" data-id="${product.product_id}">
                    <i class="fa-regular fa-eye" style="color: #234785;"></i>
                </a>
                <a href="#" class="me-2 p-2 edit-icon" data-id="${product.product_id}">
                    <i data-feather="edit" class="feather-edit"></i>
                </a>
                <a href="#" class="confirm-text p-2 delete-icon" data-id="${product.product_id}">
                    <i data-feather="trash-2" class="feather-trash-2"></i>
                </a>
            </div>
        </div>
              `
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
        console.error('AJAX Error:', status, error); 
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'An error occurred while loading product data. Please try again.'
        });
      }
    });
  }

  // Call the function to load products
  loadProducts();

  $(document).on('click', '.view-icon', function () {
    const productId = $(this).data('id');
    $.ajax({
      type: 'GET',
      url: `<?= site_url('admin/products/get_product/') ?>${productId}`,
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          const product = response.data;
          $('#viewProductDetails').html(`
            <p><strong>Name:</strong> ${product.product_name}</p>
            <p><strong>Price:</strong> $${product.price}</p>
            <p><strong>Quantity:</strong> ${product.quantity}</p>
            <p><strong>Description:</strong> ${product.description}</p>
            <img src="<?= base_url(); ?>public/userdata/img/${product.image_path}" class="img-fluid"/>
          `);
          $('#viewProductModal').modal('show');
        } else {
          Swal.fire('Error', response.message || 'Could not fetch product details', 'error');
        }
      },
      error: function () {
        Swal.fire('Error', 'Failed to load product details. Please try again.', 'error');
      }
    });
  });

  // Handle Edit Product
  $(document).on('click', '.edit-icon', function () {
    const productId = $(this).data('id');
    $.ajax({
      type: 'GET',
      url: `<?= site_url('admin/products/get_product/') ?>${productId}`,
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          const product = response.data;
          $('#editProductId').val(product.product_id);
          $('#editProductName').val(product.product_name);
          $('#editProductPrice').val(product.price);
          $('#editProductQuantity').val(product.quantity);
          $('#editProductModal').modal('show');
        } else {
          Swal.fire('Error', response.message || 'Could not fetch product details', 'error');
        }
      },
      error: function () {
        Swal.fire('Error', 'Failed to load product details. Please try again.', 'error');
      }
    });
  });

  // Submit Edit Product Form
  $('#editProductForm').submit(function (e) {
    e.preventDefault();
    const formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: `<?= site_url('admin/products/update_product') ?>`,
      data: formData,
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          $('#editProductModal').modal('hide');
          Swal.fire('Success', 'Product updated successfully', 'success');
          loadProducts(); // Refresh the product list
        } else {
          Swal.fire('Error', response.message || 'Failed to update product', 'error');
        }
      },
      error: function () {
        Swal.fire('Error', 'An error occurred while updating the product', 'error');
      }
    });
  });

  // Handle Delete Product
  $(document).on('click', '.delete-icon', function () {
    const productId = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: 'This action cannot be undone!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: `<?= site_url('admin/products/delete_product') ?>`,
          data: { product_id: productId },
          dataType: 'json',
          success: function (response) {
            if (response.status === 'success') {
              Swal.fire('Deleted!', 'The product has been deleted.', 'success');
              loadProducts(); 
            } else {
              Swal.fire('Error', response.message || 'Failed to delete product', 'error');
            }
          },
          error: function () {
            Swal.fire('Error', 'An error occurred while deleting the product', 'error');
          }
        });
      }
    });
  });
});

</script>

<?php include APP_DIR.'views/templates/footer.php';?>


</body>
</html>