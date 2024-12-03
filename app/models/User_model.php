
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    // read data
    public function get_users() {
        return $this->db->table('users')->where_null('deleted_at')->get_all();
    }
    public function get_one_user($id){
        return $this->db->table('users')->where('user_id', $id)->get();;
    }
  
    public function create_user($first_name,$last_name,  $email, $contact, $birthdate, $password, $role, $image_path){
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
    public function check_credentials($email){
        return $this->db->table('users')->where('email', $email)->where('user_status', 'active')->where_null('deleted_at')->get();;
    }
    public function  update_users($user_id, $role, $status){
        $data = array(
            'role' => $role,
            'user_status' => $status
        );
        return $this->db->table('users')->where('user_id', $user_id)->update($data);
    }
    public function  delete_users($user_id){
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        
        return $this->db->table('users')->where('user_id', $user_id)->update($data);

    }



}   
?>