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
                <h4>Category</h4>
                <h6>Manage your categories</h6>
              </div>
            </div>
            <ul class="table-top-head">
              <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"
                  ><img src="assets/img/icons/pdf.svg" alt="img"
                /></a>
              </li>
              <li>
                <a
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  title="Excel"
                  ><img src="assets/img/icons/excel.svg" alt="img"
                /></a>
              </li>
              <li>
                <a
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  title="Print"
                  ><i data-feather="printer" class="feather-rotate-ccw"></i
                ></a>
              </li>
              <li>
                <a
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  title="Refresh"
                  ><i data-feather="rotate-ccw" class="feather-rotate-ccw"></i
                ></a>
              </li>
              <li>
                <a
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  title="Collapse"
                  id="collapse-header"
                  ><i data-feather="chevron-up" class="feather-chevron-up"></i
                ></a>
              </li>
            </ul>
            <div class="page-btn">
              <a
                href="#"
                class="btn btn-added"
                data-bs-toggle="modal"
                data-bs-target="#add-category"
                ><i data-feather="plus-circle" class="me-2"></i>Add New
                Category</a
              >
            </div>
          </div>

          <div class="card table-list-card">
            <div class="card-body">
       

       
              <div class="table-responsive">
                <table class="table" id="table">
                  <thead>
                    <tr>
                      <th>Category ID</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Created On</th>
                      <th>Last Updated</th>
                      <th class="no-sort">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="add-category">
      <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
          <div class="page-wrapper-new p-0">
            <div class="content">
              <div class="modal-header border-0 custom-modal-header">
                <div class="page-title">
                  <h4>Create Category</h4>
                </div>
                <button
                  type="button"
                  class="close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body custom-modal-body">
                <form id="addCategoryFrom">
                  <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" name="category_name" />
                  </div>
                  <div class="mb-0">
                    <div
                      class="status-toggle modal-status d-flex justify-content-between align-items-center"
                    >
                      <span class="status-label">Status</span>
                      <input type="checkbox" id="category-status" class="check" name="category_status" checked />
                      <label for="category-status" class="checktoggle"></label>
                    </div>
                  </div>
                  <div class="modal-footer-btn">
                    <button
                      type="button"
                      class="btn btn-cancel me-2"
                      data-bs-dismiss="modal"
                    >
                      Cancel
                    </button>
                    <button type="submit" class="btn btn-submit">
                      Create Category
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="edit-category">
      <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
          <div class="page-wrapper-new p-0">
            <div class="content">
              <div class="modal-header border-0 custom-modal-header">
                <div class="page-title">
                  <h4>Edit Category</h4>
                </div>
                <button
                  type="button"
                  class="close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body custom-modal-body">
                <form id="editCategoryFrom">
                    <input type="hidden" id="edit-category-id" name="category_id">
                  <div class="mb-3">
                    <label class="form-label" for="">Category</label>
                    <input type="text" class="form-control" id="edit-category-name" name="category_name" />
                  </div>
                  <div class="mb-0">
                    <div
                      class="status-toggle modal-status d-flex justify-content-between align-items-center"
                    >
                      <span class="status-label">Status</span>
                      <input type="checkbox" id="edit-category-status" class="check"  name="category_status" />
                      <label for="edit-category-status" class="checktoggle"></label>
                    </div>
                  </div>
                  <div class="modal-footer-btn">
                    <button
                      type="button"
                      class="btn btn-cancel me-2"
                      data-bs-dismiss="modal"
                    >
                      Cancel
                    </button>
                    <button type="submit" class="btn btn-submit">
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>
            </div>
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

      // Load Categories from the server
function loadCategories() {
  $.ajax({
    type: "GET",
    url: "<?= site_url('admin/category/list') ?>", 
    dataType: "json",
    success: function(response) {
      if (response.status === 'success') {
        const categories = response.data;
        // Clear the table before adding new data
        table.clear();

        // Iterate through the categories and add rows to the DataTable
        categories.forEach(function(category) {
          console.log(category.category_id);

          // Condition to display category status badge
          let statusBadge = '';
          if (category.category_status === 'active') {
            statusBadge = '<span class="badge badge badge-linesuccess">Active</span>';
          } else {
            statusBadge = '<span class="badgebadge badge-linedanger">Inactive</span>';
          }

          // Add a new row to the DataTable
          table.row.add([
            category.category_id,
            category.category_name,
            statusBadge,  // Display status badge
            category.created_at,
            category.updated_at,
            `
              <div class="action-table-data">
                <div class="edit-delete-action">
                  <a href="#" class="me-2 p-2 edit-icon" data-id="${category.category_id}">
                    <i data-feather="edit" class="feather-edit"></i>
                  </a>
                  <a href="#" class="confirm-text p-2 delete-icon" data-id="${category.category_id}">
                    <i data-feather="trash-2" class="feather-trash-2"></i>
                  </a>
                </div>
              </div>
            `
          ]).draw(false);
        });

      } else {
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
      Swal.fire('Error', 'An error has occurred', 'error');
    }
  });
}


      loadCategories();

    

  $('#table').on('click', '.edit-icon', function(e) {
    e.preventDefault();

    // Get the category ID from the data attribute of the clicked edit icon
    const categoryId = $(this).data('id');
    
    // Send AJAX request to fetch category details
    $.ajax({
      type: "GET",
      url: `<?= site_url('admin/category/get/') ?>${categoryId}`, // Correct URL for getting category details
      dataType: 'json',
      success: function(response) {
        // Check if the response status is success
        if (response.status === 'success') {
          const category = response.data;
         console.log(category);
          // Populate the edit modal with category data
          $('#edit-category-id').val(category.category_id);
          $('#edit-category-name').val(category.category_name);
          $('#edit-category-status').prop('checked', category.category_status === 'active');

          // Show the modal
          $('#edit-category').modal('show');
        } else {
          // Show error message if category fetch fails
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.message || 'Something went wrong'
          });
        }
      },
      error: function(xhr, status, error) {
        // Log error details to the console for debugging
        console.error('AJAX Error:', error);
        console.error('Status:', status);
        console.error('Response:', xhr.responseText);
        
        // Show error message to the user
        Swal.fire('Error', 'An error has occurred while fetching category data', 'error');
      }
    });
});

$('#addCategoryFrom').on('submit', function(e) {
  e.preventDefault(); 
  const categoryStatus = $('#category-status').prop('checked') ? 'active' : 'inactive';
  let formData = new FormData(this);
  formData.append('category_status', categoryStatus);
  $.ajax({
    url: "<?= site_url('admin/category/add'); ?>", 
    type: "POST",
    data: formData,
    processData: false, 
    contentType: false, 
    dataType: "json", 
    success: function(response) {
      if (response.status === 'success') {
        Swal.fire('Success', response.message, 'success');
        $('#add-category').modal('hide'); // Hide the modal
      } else {
        Swal.fire('Error', response.message, 'error');
      }
      loadCategories(); // Refresh categories
    },
    // Debugging the error
    error: function(xhr, status, error) {
      console.error('AJAX Error:', error);
      console.error('Status:', status);
      console.error('Response:', xhr.responseText);
      Swal.fire('Error', 'An error has occurred', 'error');
    }
  });
});


$('#editCategoryFrom').on('submit', function(e) {
  e.preventDefault(); 
  const categoryStatus = $('#edit-category-status').prop('checked') ? 'active' : 'inactive';
  let formData = new FormData(this);
  formData.append('category_status', categoryStatus);
  $.ajax({
    url: "<?= site_url('admin/category/update'); ?>", 
    type: "POST",
    data: formData,
    processData: false, 
    contentType: false, 
    dataType: "json", 
    success: function(response) {
      if (response.status === 'success') {
        Swal.fire('Success', response.message, 'success');
        $('#edit-category').modal('hide'); // Hide the modal
      } else {
        Swal.fire('Error', response.message, 'error');
      }
      loadCategories(); // Refresh categories
    },
    // Debugging the error
    error: function(xhr, status, error) {
      console.error('AJAX Error:', error);
      console.error('Status:', status);
      console.error('Response:', xhr.responseText);
      Swal.fire('Error', 'An error has occurred', 'error');
    }
  });
});

      // Handle Delete Product
      $(document).on('click', '.delete-icon', function() {
        const categoryId = $(this).data('id');
        Swal.fire({
          title: 'Are you sure?',
          text: 'Delete Category',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: 'GET',
              url:`<?= site_url('admin/category/delete/') ?>${categoryId}`,
              dataType: 'json',
              success: function(response) {
                if (response.status === 'success') {
                  Swal.fire('Deleted!', 'The category has been deleted.', 'success');
                  loadCategories();
                } else {
                  Swal.fire('Error', response.message || 'Failed to delete category', 'error');
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