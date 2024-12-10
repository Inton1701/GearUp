<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Build_model extends Model
{
    public function add_to_build($buildData) {

        foreach ($buildData as $data) {

            $this->db->table('build_cart')->insert($data);
        }
        return true;

    }

    public function check_if_build_code_exists($buildCode) {
        // Query to check if the build_code exists in the database
        $result = $this->db->table('build_cart')->where('build_code', $buildCode)->get();
        
        // If a record is found, it means the code already exists
        return !empty($result);
    }
    // public function get_cart_items($userId)
    // {
    //     return $this->db->table('cart')
    //         ->select('cart.product_id, cart.quantity, products.product_name, products.price, products.image_path, (cart.quantity * products.price) as total_price')
    //         ->join('products', 'cart.product_id = products.product_id')
    //         ->where('cart.user_id', $userId)
    //         ->get_all();
    // }


    // public function update_cart_quantity($userId, $productId, $quantity)
    // {
    //     return $this->db->table('cart')
    //         ->where('user_id', $userId)
    //         ->where('product_id', $productId)
    //         ->update(['quantity' => $quantity]);
    // }

    // public function remove_cart_item($userId, $productId)
    // {
    //     return $this->db->table('cart')
    //         ->where('user_id', $userId)
    //         ->where('product_id', $productId)
    //         ->delete();
    // }
}
