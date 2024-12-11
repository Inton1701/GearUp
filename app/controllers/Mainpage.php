<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Mainpage extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        // $this->call->model('dashboard_model');
    }

    public function shop()
    {
        $this->call->view('mainpage/main-product');
    }

    public function contact()
    {
        $this->call->view('mainpage/contact');
    }

    public function home() {
        // Load the Brand_model
        $this->call->model('Brand_model');

        // Fetch brands from the database
        $brands = $this->Brand_model->get_brands();

        // Pass the brands data to the view
        $this->call->view('mainpage/home', ['brands' => $brands]);
    }

    public function build()
    {
        $this->call->view('mainpage/build');
    }

    public function view()
    {
        $this->call->view('mainpage/view-product');
    }
}
