<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Profile_model extends Model
{
    public function get_user_data($userId)
    {
        return $this->db->table('users')
            ->select('first_name, last_name, contact, email, birthdate')
            ->where('user_id', $userId)
            ->get();
    }
}
