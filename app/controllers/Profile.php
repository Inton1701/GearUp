<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Profile extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('profile_model');
    }

    public function profile()
    {
        $this->call->view('mainpage/profile');
    }

    public function order()
    {
        $this->call->view('mainpage/order');
    }

    public function wishlist()
    {
        $this->call->view('mainpage/wishlist');
    }

    public function address()
    {
        $this->call->view('mainpage/address');
    }

    public function get_user_data()
    {
        if (!$this->io->is_ajax()) {
            show_error('Access Denied', 403);
        }

        $userId = $this->session->userdata('user_id');
        if (!$userId) {
            error_log('User not logged in or session missing');
            echo json_encode(['error' => 'User not logged in']);
            return;
        }

        error_log('Fetching data for User ID: ' . $userId);
        $userData = $this->profile_model->get_user_data($userId);

        if ($userData) {
            echo json_encode(['success' => true, 'data' => $userData]);
        } else {
            error_log('No data found for User ID: ' . $userId);
            echo json_encode(['success' => false, 'message' => 'User data not found']);
        }
    }

    public function add_address()
    {
        if (!$this->io->is_ajax()) {
            show_error('Access Denied', 403);
        }

        $userId = $this->session->userdata('user_id');
        if (!$userId) {
            echo json_encode(['success' => false, 'message' => 'User not logged in']);
            return;
        }

        $houseNo = $this->io->post('house_no');
        $street = $this->io->post('street');
        $city = $this->io->post('city');
        $province = $this->io->post('province');

        if (empty($houseNo) || empty($street) || empty($city) || empty($province)) {
            echo json_encode(['success' => false, 'message' => 'All fields are required.']);
            return;
        }

        $result = $this->profile_model->add_address($userId, $houseNo, $street, $city, $province);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add address.']);
        }
    }

    public function get_user_addresses()
    {
        if (!$this->io->is_ajax()) {
            show_error('Access Denied', 403);
        }

        $userId = $this->session->userdata('user_id');
        if (!$userId) {
            echo json_encode(['success' => false, 'message' => 'User not logged in']);
            return;
        }

        $addresses = $this->profile_model->get_user_addresses($userId);

        if ($addresses) {
            echo json_encode(['success' => true, 'data' => $addresses]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No addresses found']);
        }
    }

    public function delete_address()
    {
        if (!$this->io->is_ajax()) {
            show_error('Access Denied', 403);
        }

        $userId = $this->session->userdata('user_id');
        if (!$userId) {
            echo json_encode(['success' => false, 'message' => 'User not logged in']);
            return;
        }

        $addressId = $this->io->post('address_id');
        if (!$addressId) {
            echo json_encode(['success' => false, 'message' => 'Address ID is required']);
            return;
        }

        $result = $this->profile_model->delete_address($userId, $addressId);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete address']);
        }
    }
}
