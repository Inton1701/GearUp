<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Cart extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('cart_model');
    }

    public function add()
    {
        $productId = $this->io->post('product_id');

        if (!$productId) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid product ID.']);
            return;
        }

        // Add product to cart (via model)
        if ($this->cart_model->add_to_cart($productId)) {
            echo json_encode(['status' => 'success', 'message' => 'Product added to cart.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add product to cart.']);
        }
    }

    public function view_cart()
    {
        $this->call->view('mainpage/cart');
    }
}
