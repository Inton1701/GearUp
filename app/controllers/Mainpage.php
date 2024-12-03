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

    public function home()
    {
        $this->call->view('mainpage/home');
    }

    public function build()
    {
        $this->call->view('mainpage/build');
    }

    public function profile()
    {
        $this->call->view('mainpage/profile');
    }

    public function view()
    {
        $this->call->view('mainpage/view-product');
    }

    public function order()
    {
        $this->call->view('mainpage/order');
    }

    public function wishlist()
    {
        $this->call->view('mainpage/wishlist');
    }
}
