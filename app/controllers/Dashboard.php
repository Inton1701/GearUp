<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Dashboard extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        // $this->call->model('dashboard_model');
    }

    public function dashboard()
    {
        $this->call->view('admin/dashboard');
    }
   
   
}
