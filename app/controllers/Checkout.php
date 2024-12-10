<?php
class Checkout extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('checkout_model');
    }

    public function addresses()
    {
        $userId = $this->session->userdata('user_id');
        if (!$userId) {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $addresses = $this->checkout_model->get_user_addresses($userId);
        if ($addresses) {
            echo json_encode(['status' => 'success', 'data' => $addresses]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No addresses found.']);
        }
    }

    public function confirm()
    {
        $userId = $this->session->userdata('user_id');
        if (!$userId) {
            error_log('Checkout failed: User not logged in');
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $addressId = $this->io->post('address_id');
        $cartItems = json_decode($this->io->post('cart_items'), true);

        if (empty($addressId)) {
            error_log('Checkout failed: Address ID is missing');
            echo json_encode(['status' => 'error', 'message' => 'Address ID is required.']);
            return;
        }

        if (empty($cartItems) || !is_array($cartItems)) {
            error_log('Checkout failed: Cart items are invalid');
            echo json_encode(['status' => 'error', 'message' => 'Cart items are required and must be valid.']);
            return;
        }

        $orderId = $this->checkout_model->create_order($userId, $addressId, $cartItems);
        if ($orderId) {
            echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.', 'order_id' => $orderId]);
        } else {
            error_log('Checkout failed: Database error occurred while creating order');
            echo json_encode(['status' => 'error', 'message' => 'Failed to place order.']);
        }
    }
}
