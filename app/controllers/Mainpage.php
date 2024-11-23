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

    public function cart()
    {
        $this->call->view('mainpage/cart');
    }

}
