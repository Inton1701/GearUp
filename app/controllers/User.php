<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class User extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        $this->call->model('user_model');
        $this->call->library('upload');
    }
    // loadin users page
    public function user()
    {
        $this->call->view('admin/user');
    }
    // fetch products all products
    public function user_list()
    {
        $users = $this->user_model->get_users();
        if ($users) {
            echo json_encode([
                'status' => 'success',
                'data' => $users
            ]);
        } else {

            echo json_encode([
                'status' => 'error',
                'message' => 'No users found.'
            ]);
        }
    }
    

    public function add_user()
    {
        if ($this->form_validation->submitted()) {

            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $email = $this->io->post('email');
            $contact = $this->io->post('contact');
            $password = $this->io->post('password');
            $birthdate = $this->io->post('birthdate');
            $role = $this->io->post('role');


            
                $image_path = null;
                if (isset($_FILES['user_profile']) && $_FILES['user_profile']['error'] === UPLOAD_ERR_OK) {
                    $upload = new Upload($_FILES['user_profile']);
                    $upload->set_dir('./public/userdata/img/')
                           ->allowed_extensions(['jpg', 'jpeg', 'png', 'gif'])
                           ->encrypt_name();
        
                    if ($upload->do_upload()) {
                        $image_path = $upload->get_filename();
                    } 
                }

            // Insert user into the database with image path
            if ($this->user_model->create_user(
                $first_name,
                $last_name, 
                $email,
                $contact,
                $birthdate,
                $password,
                $role,
                $image_path
            )) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'User  successfully added'
                ]);
            } else {
                // Handle the failure and redirect to the add user page
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to add brand'
                ]);
            }

        }
    }
    public function get_user($id)
    {
       $user = $this->user_model->get_one_user($id);
        if ($user) {
            echo json_encode([
                'status' => 'success',
                'data' => $user
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Category not found'
            ]);
        }
    }

    public function update_user()
    {

        if ($this->form_validation->submitted()) {
            $user_id = $this->io->post('user_id');
           $role = $this->io->post('user_role');
           $status = $this->io->post('user_status');
            if ($this->user_model->update_users(
                    $user_id,
                    $role,
                    $status                
                )) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'User was successfully updated'
                ]);
            } else {
                // Pass the error message to json
                $error = $this->db->error();
                echo json_encode([
                    'status' => 'error',
                    'message' => 'User update failed: ' . $error['message']
                ]);
            }
        }
    }
    public function delete_user($id)
    {
        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
        }
        if ($this->user_model->delete_users($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'User successfully deleted'
            ]);
        }
    }
}
