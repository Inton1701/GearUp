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
            <h4>User List</h4>
            <h6>Manage Your Users</h6>
          </div>
        </div>

        <div class="page-btn">
          <a
            href="#"
            class="btn btn-added"
            data-bs-toggle="modal"
            data-bs-target="#add-users"><i data-feather="plus-circle" class="me-2"></i>Add New User</a>
        </div>
      </div>

      <div class="card table-list-card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="table">
              <thead>
                <tr>
                  <th>User Full Name</th>
                  <th>Phone</th>
                  <th>email</th>
                  <th>Status</th>
                  <th>Role</th>
                  <th>Created On</th>
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

  <div class="modal fade" id="add-users">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
      <div class="modal-content">
        <div class="page-wrapper-new p-0">
          <div class="content">
            <div class="modal-header border-0 custom-modal-header">
              <div class="page-title">
                <h4>Add User</h4>
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
              <form id="addUserForm" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-12">
                    <label class="form-label">User Profile</label>
                    <div class="profile-pic-upload mb-3">
                      <div class="profile-pic user-pic">
                        <span><img src="" alt /></span>
                        <a href="javascript:void(0);" class="remove-photo"><i data-feather="x" class="x-square-add"></i></a>
                      </div>
                      <div class="image-upload mb-0">
                        <input type="file" id="add-user-logo" name="user_profile" />
                        <div class="image-uploads">
                          <h4>Change Image</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-blocks">
                      <label>First Name</label>
                      <input type="text" class="form-control" name="first_name" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-blocks">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="last_name" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-blocks">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="contact" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-blocks">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-blocks">
                      <label>Birthdate</label>
                      <input type="date" class="form-control" name="birthdate" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-blocks">
                      <label>Role</label>
                      <select class="select" name="role">
                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-blocks">
                      <label>Password</label>
                      <div class="pass-group">
                        <input type="password" id="add-password" class="pass-input" name="password" />
                        <span class="fas toggle-password fa-eye-slash"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-blocks">
                      <label>Confirm Passworrd</label>
                      <div class="pass-group">
                        <input type="password" id="add-conf-password" class="pass-input" name="conf_password" />
                        <span class="fas toggle-password fa-eye-slash"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer-btn">
                  <button
                    type="button"
                    class="btn btn-cancel me-2"
                    data-bs-dismiss="modal">
                    Cancel
                  </button>
                  <button type="submit" class="btn btn-submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit-users">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
      <div class="modal-content">
        <div class="modal-header border-0 custom-modal-header">
          <div class="page-title">
            <h4>Edit User</h4>
          </div>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body custom-modal-body">
          <form id="editUserForm">
            <input type="hidden" id="edit-user-id" name="user_id">
            <div class="input-blocks">
              <label>Role</label>
              <select class="select" name="user_role">
              </select>
            </div>
            <div class="input-blocks">
              <label>Status</label>
              <select class="select" name="user_status">
              </select>
            </div>
            <div class="modal-footer-btn">
              <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-submit">Save Changes</button>
            </div>
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

      // Load Categories from the server
      function loadUsers() {
        $.ajax({
          type: "GET",
          url: "<?= site_url('admin/user/list') ?>",
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              const users = response.data;

              // Clear existing rows
              table.clear();

              // Populate table with user data
              users.forEach(function(user) {
                let statusBadge = "";
                if (user.user_status === "active") {
                  statusBadge = '<span class="badge badge-success">Active</span>';
                } else if (user.user_status === "inactive") {
                  statusBadge = '<span class="badge badge-warning">Inactive</span>';
                } else if (user.user_status === "banned") {
                  statusBadge = '<span class="badge badge-danger">Banned</span>';
                }

                const imageSrc = user.profile_pic || "no-profile.jpg";

                table.row.add([
                  `
              <div class="userimgname">
                <span href="javascript:void(0);" class="userslist-img">
                  <img src="<?= base_url(); ?>public/userdata/img/${imageSrc}" alt="${user.first_name}" />
                </span>
                <div>
                  ${user.first_name} ${user.last_name}
                </div>
              </div>
            `,
                  user.contact ? user.contact : "No contact",
                  user.email ? user.email : "No email address",
                  statusBadge,
                  user.role ? user.role : "No role assigned",
                  user.created_at,
                  `
              <div class="action-table-data">
                <div class="edit-delete-action">
                  <a href="#" class="me-2 p-2 edit-icon" data-id="${user.user_id}">
                    <i data-feather="edit" class="feather-edit"></i>
                  </a>
                  <a href="#" class="confirm-text p-2 delete-icon" data-id="${user.user_id}">
                    <i data-feather="trash-2" class="feather-trash-2"></i>
                  </a>
                </div>
              </div>
            `,
                ]).draw(false);
              });

              // Reinitialize Feather icons
              feather.replace();
            } else {
              Swal.fire({
                icon: "error",
                title: "Connection Error",
                text: response.message || "Something went wrong",
              });
            }
          },
          error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            console.error("Status:", status);
            console.error("Response:", xhr.responseText);
            Swal.fire("Error", "An error has occurred", "error");
          },
        });
      }
      loadUsers();

      $(document).on('click', '.edit-icon', function() {
        const userId = $(this).data('id'); // Get the user ID from the button's data-id attribute

        $.ajax({
          type: 'GET',
          url: `<?= site_url('admin/user/get/') ?>${userId}`,
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
              const user = response.data;
              const statuses = ['active', 'inactive', 'banned'];
              $('#edit-user-id').val(user.user_id); // Hidden input for user ID
              $('#edit-users h4').text(`${user.first_name} ${user.last_name}`);

              const roleSelect = $('select[name="user_role"]');
              roleSelect.empty();
              roleSelect.append('<option value="" disabled>Select a role</option>'); // Default option
              roleSelect.append('<option value="admin" ' + (user.role === 'admin' ? 'selected' : '') + '>Admin</option>');
              roleSelect.append('<option value="customer" ' + (user.role === 'customer' ? 'selected' : '') + '>Customer</option>');

              const statusSelect = $('select[name="user_status"]');
              statusSelect.empty();
              statusSelect.append('<option value="" disabled>Select a status</option>'); // Default option
              statuses.forEach(status => {
                statusSelect.append(
                  `<option value="${status}" ${status == user.user_status ? 'selected' : ''}>${status.charAt(0).toUpperCase() + status.slice(1)}</option>`
                );
              });

              // Show the modal
              $('#edit-users').modal('show');
            } else {
              Swal.fire('Error', response.message || 'Could not fetch user details', 'error');
            }
          },
          error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error');
          }
        });
      });



      // handle user add

      $('#addUserForm').on('submit', function(e) {
        e.preventDefault();

        // Retrieve form fields
        const password = $('#add-password').val();
        const confirmPassword = $('#add-conf-password').val();

        // Password validation
        if (!password) {
          Swal.fire('Error', 'Password cannot be empty.', 'error');
          return; // Stop submission
        }

        if (password.length < 8) {
          Swal.fire('Error', 'Password must be at least 8 characters long.', 'error');
          return; // Stop submission
        }

        if (!/[A-Z]/.test(password)) {
          Swal.fire('Error', 'Password must contain at least one uppercase letter.', 'error');
          return; // Stop submission
        }

        if (!/[a-z]/.test(password)) {
          Swal.fire('Error', 'Password must contain at least one lowercase letter.', 'error');
          return; // Stop submission
        }

        if (!/[0-9]/.test(password)) {
          Swal.fire('Error', 'Password must contain at least one number.', 'error');
          return; // Stop submission
        }

        if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
          Swal.fire('Error', 'Password must contain at least one special character.', 'error');
          return; // Stop submission
        }

        if (password !== confirmPassword) {
          Swal.fire('Error', 'Passwords do not match.', 'error');
          return; // Stop submission
        }

        let formData = new FormData(this);
        $.ajax({
          url: "<?= site_url('admin/user/add'); ?>",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function(response) {
            if (response.status === 'success') {
              Swal.fire('Success', response.message, 'success');
              $('#add-users').modal('hide');
            }
          },
          error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error');
          }
        });
      });


      // handle user edit
      $('#editUserForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
          url: "<?= site_url('admin/user/update'); ?>",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function(response) {
            if (response.status === 'success') {
              Swal.fire('Success', response.message, 'success');
              $('#edit-users').modal('hide');
            } else {
              Swal.fire('Error', response.message, 'error');
            }
            loadUsers();
          },
          error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'An error has occurred', 'error');
          }
        });
      });


      // Handle Delete uuser
      $(document).on('click', '.delete-icon', function() {
        const userId = $(this).data('id');
        Swal.fire({
          title: 'Are you sure?',
          text: 'Delete user',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: 'GET',
              url: `<?= site_url('admin/user/delete/') ?>${userId}`,
              dataType: 'json',
              success: function(response) {
                if (response.status === 'success') {
                  Swal.fire('Deleted!', 'The user has been deleted.', 'success');

                  loadUsers();
                } else {
                  Swal.fire('Error', response.message || 'Failed to delete user', 'error');
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

    // // Initialize the function for the Edit user Modal
    // handleImagePreview(
    //   "#edituserForm .image-upload input[type='file']", // File input selector
    //   "#edituserForm .profile-pic img", // Image preview selector
    //   "#edituserForm .remove-photo" // Remove photo selector
    // );

    handleImagePreview(
      "#addUserForm .image-upload input[type='file']", // File input selector
      "#addUserForm .profile-pic img", // Image preview selector
      "#addUserForm .remove-photo" // Remove photo selector
    );
  </script>

  <?php include APP_DIR . 'views/templates/footer.php'; ?>

</body>

</html>