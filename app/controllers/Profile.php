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
}
