
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    // read data
    public function get_users() {
        return $this->db->table('users')->get_all();
    }
    public function get_one_user($id){
        return $this->db->table('users as p')
        ->inner_join('categories as c', 'p.category_id=c.category_id')
        ->inner_join('brand as b', 'p.brand_id=b.brand_id')->where('user_id', $id)->get();;
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
    public function  update_users($user_id, $user_name, $description, $price, $quantity, $quantity_alert, $brand, $category, $image_path, $updated_at){
        $data = array(
            'user_name' => $user_name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity,
            'quantity_alert' => $quantity_alert,
            'brand_id' => $brand,
            'category_id' => $category,
            'image_path' => $image_path,
            'updated_at' => $updated_at
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