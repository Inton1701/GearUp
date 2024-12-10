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

    public function add_address($userId, $houseNo, $street, $City, $Province)
    {
        $data = [
            'user_id' => $userId,
            'house_no' => $houseNo,
            'street' => $street,
            'City' => $City,
            'Province' => $Province,
        ];

        return $this->db->table('address')->insert($data);
    }

    public function get_user_addresses($userId)
    {
        return $this->db->table('address')
            ->select('*')
            ->where('user_id', $userId)
            ->get_all(); // Assuming `get_all()` returns an array of results
    }
}
