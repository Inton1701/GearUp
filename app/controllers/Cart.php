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

    public function addBuild(){
        $cart = $this->io->post('cart');

        $requiredComponents = ['cpu', 'motherboard', 'ssd', 'hdd', 'ram', 'psu', 'case'];
        
        // Check if all required components are in the cart
        $missingComponents = [];

        foreach ($requiredComponents as $component) {
            if (!isset($cart[$component]) || $cart[$component]['quantity'] < 1) {
                $missingComponents[] = $component;
            }
        }

        if (!empty($missingComponents)) {
            echo json_encode(['status' => 'error', 'message' => 'Missing components: ' . implode(', ', $missingComponents)]);
            return;
        }

        

    }
    public function view_cart()
    {
        if ($this->io->is_ajax()) {
            $userId = $this->session->userdata('user_id');
            if (!$userId) {
                echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
                return;
            }

            $cartItems = $this->cart_model->get_cart_items($userId);
            if ($cartItems) {
                echo json_encode(['status' => 'success', 'data' => $cartItems]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Cart is empty.']);
            }
            return;
        }
        $this->call->view('mainpage/cart');
    }

    public function update_quantity()
    {
        if ($this->io->is_ajax()) {
            $productId = $this->io->post('product_id');
            $quantity = $this->io->post('quantity');

            if (!$productId || !$quantity || intval($quantity) < 1) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid product ID or quantity.']);
                return;
            }

            $userId = $this->session->userdata('user_id');
            if (!$userId) {
                echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
                return;
            }

            $updated = $this->cart_model->update_cart_quantity($userId, $productId, intval($quantity));
            if ($updated) {
                echo json_encode(['status' => 'success', 'message' => 'Cart updated successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update cart.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
        }
    }

    public function remove()
    {
        if ($this->io->is_ajax()) {
            $productId = $this->io->post('product_id');

            if (!$productId) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid product ID.']);
                return;
            }

            $userId = $this->session->userdata('user_id');
            if (!$userId) {
                echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
                return;
            }

            $removed = $this->cart_model->remove_cart_item($userId, $productId);
            if ($removed) {
                echo json_encode(['status' => 'success', 'message' => 'Item removed from cart.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to remove item from cart.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
        }
    }
}
