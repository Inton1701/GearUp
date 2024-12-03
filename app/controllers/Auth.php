<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('auth_model');
    }

    // Render the login view
    public function showLoginForm()
    {
        $this->call->view('auth/login');
    }

    public function handleLogin()
    {
        $email = $this->io->post('email');
        $password = $this->io->post('password');

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false || strlen($password) < 6) {
            $data['error'] = 'Invalid email format or password too short.';
            $this->call->view('auth/login', $data);
            return;
        }

        $user = $this->auth_model->get_user_by_email($email);
        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('user_id', $user['user_id']);
            $this->session->set_userdata('email', $user['email']);
            redirect('home');
        } else {
            $data['error'] = 'Invalid email or password.';
            $this->call->view('auth/login', $data);
        }
    }

    public function showRegisterForm()
    {
        $this->call->view('auth/register');
    }


    public function handleRegister()
    {
        if ($this->form_validation->submitted()) {

            // Fetch form data
            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $email = $this->io->post('email');
            $contact = $this->io->post('contact');
            $password = $this->io->post('password');
            $birthdate = $this->io->post('birthdate');

            // Set role to 'customer' by default
            $role = 'customer';

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
            if ($this->auth_model->create_user(
                $first_name,
                $last_name,
                $email,
                $contact,
                $birthdate,
                $password,
                $role,
                $image_path
            )) {
                // Redirect to home page after successful registration
                redirect('home');
            } else {
                // Handle failure and display message
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to add user'
                ]);
            }
        }
    }




    // Handle logout
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->call->view('auth/login');
    }
}
