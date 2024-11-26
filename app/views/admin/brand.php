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
            <h4>Brand</h4>
            <h6>Manage your brands</h6>
          </div>
        </div>
        <ul class="table-top-head">
          <li>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img" /></a>
          </li>
          <li>
            <a
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Excel"><img src="assets/img/icons/excel.svg" alt="img" /></a>
          </li>
          <li>
            <a
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Print"><i data-feather="printer" class="feather-rotate-ccw"></i></a>
          </li>
          <li>
            <a
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Refresh"><i data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
          </li>
          <li>
            <a
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              title="Collapse"
              id="collapse-header"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
          </li>
        </ul>
        <div class="page-btn">
          <a
            href="#"
            class="btn btn-added"
            data-bs-toggle="modal"
            data-bs-target="#add-brand"><i data-feather="plus-circle" class="me-2"></i>Add New Brand</a>
        </div>
      </div>

      <div class="card table-list-card">
        <div class="card-body">


          <div class="table-responsive">
            <table class="table" id="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Brand</th>
                  <th>Logo</th>
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

  <div class="modal fade" id="add-brand">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
      <div class="modal-content">
        <div class="page-wrapper-new p-0">
          <div class="content">
            <div class="modal-header border-0 custom-modal-header">
              <div class="page-title">
                <h4>Create Brand</h4>
              </div>
              <button
                type="button"
                class="close"
                data-bs-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body custom-modal-body new-employee-field">
              <form id="addBrandForm" enctype="multipart/form-data">
                <div class="mb-3">
                  <label class="form-label">Brand</label>
                  <input type="text" class="form-control" name="brand_name" />
                </div>
                <label class="form-label">Logo</label>
                <div class="profile-pic-upload mb-3">
                  <div class="profile-pic brand-pic">
                    <span><img src="" alt /></span>
                    <a href="javascript:void(0);" class="remove-photo"><i data-feather="x" class="x-square-add"></i></a>
                  </div>
                  <div class="image-upload mb-0">
                    <input type="file" id="add-brand-logo" name="brand_logo" />
                    <div class="image-uploads">
                      <h4>Change Image</h4>
                    </div>
                  </div>
                </div>
                <div class="mb-0">
                  <div
                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                    <span class="status-label">Status</span>
                    <input type="checkbox" id="brand-status" class="check" checked name="brand_status" />
                    <label for="brand-status" class="checktoggle"></label>
                  </div>
                </div>
                <div class="modal-footer-btn">
                  <button
                    type="button"
                    class="btn btn-cancel me-2"
                    data-bs-dismiss="modal">
                    Cancel
                  </button>
                  <button type="submit" class="btn btn-submit">
                    Create Brand
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit-brand">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
      <div class="modal-content">
        <div class="page-wrapper-new p-0">
          <div class="content">
            <div class="modal-header border-0 custom-modal-header">
              <div class="page-title">
                <h4>Edit Brand</h4>
              </div>
              <button
                type="button"
                class="close"
                data-bs-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body custom-modal-body new-employee-field">
              <form id="editBrandForm" enctype="multipart/form-data">
                <div class="mb-3">
                  <input type="hidden" name="brand_id" id="edit-brand-id">
                  <label class="form-label">Brand</label>
                  <input type="text" class="form-control" name="brand_name" id="edit-brand-name" />
                </div>
                <label class="form-label">Logo</label>
                <div class="profile-pic-upload mb-3">
                  <div class="profile-pic brand-pic">
                    <span><img src="" alt /></span>
                    <a href="javascript:void(0);" class="remove-photo"><i data-feather="x" class="x-square-add"></i></a>
                  </div>
                  <div class="image-upload mb-0">
                    <input type="file" id="edit-brand-logo" name="brand_logo" />
                    <div class="image-uploads">
                      <h4>Change Image</h4>
                    </div>
                  </div>
                </div>
                <div class="mb-0">
                  <div
                    class="status-toggle modal-status d-flex justify-content-between align-items-center">
                    <span class="status-label">Status</span>
                    <input type="checkbox" id="edit-brand-status" name="brand_status" class="check" checked />
                    <label for="edit-brand-status" class="checktoggle"></label>
                  </div>
                </div>
                <div class="modal-footer-btn">
                  <button
                    type="button"
                    class="btn btn-cancel me-2"
                    data-bs-dismiss="modal">
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
      function loadBrands() {
        $.ajax({
          type: "GET",
          url: "<?= site_url('admin/brand/list') ?>", // Update with your actual endpoint
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              const brands = response.data;
              // Clear the table before adding new data
              table.clear();

              // Iterate through the categories and add rows to the DataTable
              brands.forEach(function(brand) {
                console.log(brand.brand_id);
                let statusBadge = '';
                if (brand.brand_status === 'active') {
                  statusBadge = '<span class="badge badge badge-linesuccess">Active</span>';
                } else {
                  statusBadge = '<span class="badgebadge badge-linedanger">Inactive</span>';
                }

                // Add a new row to the DataTable
                table.row.add([
                  brand.brand_id,
                  brand.brand_name,
                  `
             <span class="d-flex">
                  <img src="<?= base_url(); ?>public/userdata/img/${brand.brand_logo}" alt="No logo" onerror="this.src='<?= base_url(); ?>public/userdata/img/no-image.png';" style="width:50px; height:40px;"/>
                </span>
            `,
                  statusBadge,
                  brand.created_at,
                  brand.update_at,
                  `
              <div class="action-table-data">
                <div class="edit-delete-action">
                  <a href="#" class="me-2 p-2 edit-icon" data-id="${brand.brand_id}">
                    <i data-feather="edit" class="feather-edit"></i>
                  </a>
                  <a href="#" class="confirm-text p-2 delete-icon" data-id="${brand.brand_id}">
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

      loadBrands();

      $('#table').on('click', '.edit-icon', function(e) {
        e.preventDefault();

        const brandId = $(this).data('id');

        $.ajax({
          type: "GET",
          url: `<?= site_url('admin/brand/get/') ?>${brandId}`,
          dataType: 'json',
          success: function(response) {
            // Check if the response status is success
            if (response.status === 'success') {
              const brand = response.data;

              // Populate the edit modal with brand data
              $('#edit-brand-id').val(brand.brand_id);
              $('#edit-brand-name').val(brand.brand_name);
              $('#edit-brand-status').prop('checked', brand.brand_status === 'active');
              // Set the brand logo, use default image if null
              const logoPath = brand.brand_logo ?
                `<?= base_url(); ?>public/userdata/img/${brand.brand_logo}` :
                `<?= base_url(); ?>public/userdata/img/no-image.png`;
              $('#edit-brand .profile-pic img').attr('src', logoPath);


              $('#edit-brand').modal('show');
            } else {

              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message || 'Something went wrong'
              });
            }
          },
          error: function(xhr, status, error) {

            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred while fetching brand data', 'error');
          }
        });
      });

      $('#addBrandForm').on('submit', function(e) {
        e.preventDefault();
        const brandStatus = $('#brand-status').prop('checked') ? 'active' : 'inactive';
        let formData = new FormData(this);
        formData.append('brand_status', brandStatus);
        $.ajax({
          url: "<?= site_url('admin/brand/add'); ?>",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function(response) {
            if (response.status === 'success') {
              Swal.fire('Success', response.message, 'success');
              $('#add-brand').modal('hide'); // Hide the modal
            } else {
              Swal.fire('Error', response.message, 'error');
            }
            loadBrands();
          },

          error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error');
          }
        });
      });


      $('#editBrandForm').on('submit', function(e) {
        e.preventDefault();
        const brandStatus = $('#edit-brand-status').prop('checked') ? 'active' : 'inactive';
        let formData = new FormData(this);
        formData.append('brand_status', brandStatus);
        $.ajax({
          url: "<?= site_url('admin/brand/update'); ?>",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function(response) {
            if (response.status === 'success') {
              Swal.fire('Success', response.message, 'success');
              $('#edit-brand').modal('hide');
            } else {
              Swal.fire('Error', response.message, 'error');
            }
            loadBrands();
          },
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
        const brandId = $(this).data('id');
        Swal.fire({
          title: 'Are you sure?',
          text: 'Delete brand',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: 'GET',
              url: `<?= site_url('admin/brand/delete/') ?>${brandId}`,
              dataType: 'json',
              success: function(response) {
                if (response.status === 'success') {
                  Swal.fire('Deleted!', 'The brand has been deleted.', 'success');

                  loadBrands();
                } else {
                  Swal.fire('Error', response.message || 'Failed to delete brand', 'error');
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



    function handleImagePreview(inputSelector, previewSelector, removeSelector) {

      $(inputSelector).on("change", function(event) {
        const input = event.target;
        const file = input.files[0];

        if (file) {
          // Check if image
          if (file.type.startsWith("image/")) {
            const reader = new FileReader();


            reader.onload = function(e) {
              $(previewSelector).attr("src", e.target.result); // img preview
            };

            reader.readAsDataURL(file);
          } else {
            Swal.fire("Invalid File", "Please upload a valid image file.", "error");
            $(inputSelector).val(""); // Reset file input
          }
        }
      });


      $(removeSelector).on("click", function() {
        $(previewSelector).attr("src", ""); // clear image preview
        $(inputSelector).val(""); // clear the value
      });
    }

    // Initialize the function for the Edit Brand Modal
    handleImagePreview(
      "#editBrandForm .image-upload input[type='file']", // File input selector
      "#editBrandForm .profile-pic img", // Image preview selector
      "#editBrandForm .remove-photo" // Remove photo selector
    );

    handleImagePreview(
      "#addBrandForm .image-upload input[type='file']", // File input selector
      "#addBrandForm .profile-pic img", // Image preview selector
      "#addBrandForm .remove-photo" // Remove photo selector
    );
  </script>

  <?php include APP_DIR . 'views/templates/footer.php'; ?>

</body>

</html>