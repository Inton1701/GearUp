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
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $addressId = $this->io->post('address_id');
        $cartItems = json_decode($this->io->post('cart_items'), true); // Ensure JSON is properly decoded

        if (empty($addressId) || empty($cartItems)) {
            echo json_encode(['status' => 'error', 'message' => 'Address and cart items are required.']);
            return;
        }

        $orderId = $this->checkout_model->create_order($userId, $addressId, $cartItems);
        if ($orderId) {
            echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.', 'order_id' => $orderId]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to place order.']);
        }
    }
}
