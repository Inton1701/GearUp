<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class auth_model extends Model
{
    public function get_user_by_email($email)
    {
        return $this->db->table('users')
            ->where('email', $email)
            ->get();
    }

    public function create_user($first_name, $last_name,  $email, $contact, $birthdate, $password, $role, $image_path)
    {
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'contact' => $contact,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'birthdate' => $birthdate,
            'role' => $role,
            'profile_pic' => $image_path,
            'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->table('users')->insert($data);
    }
}
