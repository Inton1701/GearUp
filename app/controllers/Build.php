<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Build extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('build_model');
    }
    public function add_build() {
        $cart = [];
        if ($this->io->is_ajax()) {
            // Check if content is JSON
            $contentType = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
            
            if (stripos($contentType, 'application/json') !== false) {
                // Parse JSON
                $input = json_decode(file_get_contents('php://input'), true);
                $cart = isset($input['cart']) ? $input['cart'] : null;
            } else {
                // Fallback for regular POST request
                $cart = $this->io->post('cart');
            }
    
            if (!$cart) {
                echo json_encode(['status' => 'error', 'message' => 'Cart data is missing or invalid!']);
                return;
            }
    
            // Generate a unique build code
            $buildCode = $this->generate_unique_build_code();
            $buildData = [];
    
            // Iterate over the cart and prepare data for the build
            foreach ($cart as $item) {
                if (isset($item['productId'], $item['productName'], $item['quantity']) && $item['quantity'] > 0) {
                    // Add product to build data if it exists
                    $buildData[] = [
                        'user_id'    => $this->session->userdata('user_id'),
                        'product_id' => $item['productId'], 
                        'quantity'   => $item['quantity'],   
                        'build_code' => $buildCode,          
                    ];
                }
            }
    
            if (empty($buildData)) {
                echo json_encode(['status' => 'error', 'message' => 'No valid products in the cart!']);
                return;
            }
    
            // Attempt to add the build data to the database
            if ($this->build_model->add_to_build($buildData)) {
                echo json_encode(['status' => 'success', 'message' => 'Build successfully added!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save build to database.']);
            }
        }
    }
    
    
    // Function to generate a unique 8-character build code
    private function generate_unique_build_code() {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        do {
            $buildCode = '';
            for ($i = 0; $i < 8; $i++) {
                $buildCode .= $characters[rand(0, strlen($characters) - 1)];
            }
        // Check if the generated build_code already exists in the database
        } while ($this->build_model->check_if_build_code_exists($buildCode)); 
        return $buildCode;
    }

    
    // public function view_cart()
    // {
    //     if ($this->io->is_ajax()) {
    //         $userId = $this->session->userdata('user_id');
    //         if (!$userId) {
    //             echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
    //             return;
    //         }

    //         $cartItems = $this->build_model->get_cart_items($userId);
    //         if ($cartItems) {
    //             echo json_encode(['status' => 'success', 'data' => $cartItems]);
    //         } else {
    //             echo json_encode(['status' => 'error', 'message' => 'Cart is empty.']);
    //         }
    //         return;
    //     }
    //     $this->call->view('mainpage/cart');
    // }

    // public function update_quantity()
    // {
    //     if ($this->io->is_ajax()) {
    //         $productId = $this->io->post('product_id');
    //         $quantity = $this->io->post('quantity');

    //         if (!$productId || !$quantity || intval($quantity) < 1) {
    //             echo json_encode(['status' => 'error', 'message' => 'Invalid product ID or quantity.']);
    //             return;
    //         }

    //         $userId = $this->session->userdata('user_id');
    //         if (!$userId) {
    //             echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
    //             return;
    //         }

    //         $updated = $this->build_model->update_cart_quantity($userId, $productId, intval($quantity));
    //         if ($updated) {
    //             echo json_encode(['status' => 'success', 'message' => 'Cart updated successfully.']);
    //         } else {
    //             echo json_encode(['status' => 'error', 'message' => 'Failed to update cart.']);
    //         }
    //     } else {
    //         echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    //     }
    // }

    // public function remove()
    // {
    //     if ($this->io->is_ajax()) {
    //         $productId = $this->io->post('product_id');

    //         if (!$productId) {
    //             echo json_encode(['status' => 'error', 'message' => 'Invalid product ID.']);
    //             return;
    //         }

    //         $userId = $this->session->userdata('user_id');
    //         if (!$userId) {
    //             echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
    //             return;
    //         }

    //         $removed = $this->build_model->remove_cart_item($userId, $productId);
    //         if ($removed) {
    //             echo json_encode(['status' => 'success', 'message' => 'Item removed from cart.']);
    //         } else {
    //             echo json_encode(['status' => 'error', 'message' => 'Failed to remove item from cart.']);
    //         }
    //     } else {
    //         echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    //     }
    // }
}
