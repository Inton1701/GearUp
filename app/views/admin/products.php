<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include APP_DIR . 'views/templates/header.php'; ?>

  <title>Dashboard</title>

</head>

<body>

  <?php include APP_DIR . 'views/templates/navbar.php'; ?>

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
          <a href="/admin/products/add-products" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i>Add New Product</a>
        </div>
      </div>
      <div class="card table-list-card">
        <div class="card-body">
          <div class="table-responsive product-list">
            <table class="table" id="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Price</th>
                  <th>Cost</th>
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

      // Load Products from the server
      function loadProducts() {
        $.ajax({
          type: "GET",
          url: "<?= site_url('admin/products/list') ?>",
          dataType: "json",
          success: function(response) {
            if (response.status === 'success') {
              const products = response.data;
              // Clear the table before adding new data
              table.clear();

              // Iterate through the products and add rows to the DataTable
              products.forEach(function(product) { 
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
                  product.cost,
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
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error')
          }
        });
      }

      // Call the function to load products
      loadProducts();

      $(document).on('click', '.view-icon', function() {
        const productId = $(this).data('id');
        $.ajax({
          type: 'GET',
          url: `<?= site_url('admin/products/get/') ?>${productId}`,
          dataType: 'json',
          success: function(response) {
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
          error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error')
          }
        });
      });

    // Handle Edit Product
$(document).on('click', '.edit-icon', function () {
  const productId = $(this).data('id');
  $.ajax({
    type: 'GET',
    url: `<?= site_url('admin/products/get/') ?>${productId}`,
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const product = response.data.product;
        const categories = response.data.categories;
        const brands = response.data.brands;

        // Populate product details
        $('#editProductId').val(product.product_id);
        $('#editProductName').val(product.product_name);
        $('#editProductDescription').val(product.product_description);
        $('#editProductPrice').val(product.price);
        $('#editProductCost').val(product.cost);
        $('#editProductQuantity').val(product.quantity);
        $('#editQuantityAlert').val(product.quantity_alert);
        $('#editProductPerformance').val(product.performance);
        // Populate categories dropdown
        const categorySelect = $('#editProductCategory');
        categorySelect.empty(); // Clear previous options
        categorySelect.append('<option value="" disabled>Select a category</option>');
        categories.forEach(category => {
          categorySelect.append(
            `<option value="${category.category_id}" ${
              category.category_id == product.category_id ? 'selected' : ''
            }>${category.category_name}</option>`
          );
        });

        // Populate brands dropdown
        const brandSelect = $('#editProductBrand');
        brandSelect.empty(); // Clear previous options
        brandSelect.append('<option value="" disabled>Select a brand</option>');
        brands.forEach(brand => {
          brandSelect.append(
            `<option value="${brand.brand_id}" ${
              brand.brand_id == product.brand_id ? 'selected' : ''
            }>${brand.brand_name}</option>`
          );
        });

        // Show the modal
        $('#editProductModal').modal('show');
      } else {
        Swal.fire('Error', response.message || 'Could not fetch product details', 'error');
      }
    },
    error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error')
          }
  });
});


  // Handle Update
      $('#editProductForm').on('submit', function(e) {
        e.preventDefault(); // Prevent submit
        
        // fetch nito yung lahat ng nasa loob ng form
        let formData = new FormData(this);

        // Send AJAX request
        $.ajax({
          url: "<?= site_url('admin/products/update'); ?>", 
          type: "POST",
          data: formData,
          processData: false, 
          contentType: false, 
          dataType: "json", 
          success: function(response) {
            if (response.status === 'success') {
              Swal.fire('Success', response.message, 'success');
              $('#editProductModal').modal('hide');
            } else {
              Swal.fire('Errro', response.message, 'error');
            }
            loadProducts();
          },
          // pang debug
          error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error')
          },
        });
      });

      // Handle Delete Product
      $(document).on('click', '.delete-icon', function() {
        const productId = $(this).data('id');
        Swal.fire({
          title: 'Are you sure?',
          text: 'Delete Product',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: 'GET',
              url:`<?= site_url('admin/products/delete/') ?>${productId}`,
              dataType: 'json',
              success: function(response) {
                if (response.status === 'success') {
                  Swal.fire('Deleted!', 'The product has been deleted.', 'success');
                  loadProducts();
                } else {
                  Swal.fire('Error', response.message || 'Failed to delete product', 'error');
                }
              },
              error: function(xhr, status, error) {
              console.error('AJAX Error:', error);
              console.error('Status:', status);
              console.error('Response:', xhr.responseText);
              Swal.fire('Error', 'An error has occurred', 'error')
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