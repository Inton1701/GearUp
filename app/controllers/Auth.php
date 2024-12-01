<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Auth extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        // $this->call->model('dashboard_model');
    }

    public function login()
    {
        $this->call->view('auth/login');
    }

    public function register()
    {
        $this->call->view('auth/register');
    }
}
