<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Cart_model extends Model
{
    public function add_to_cart($productId)
    {
        $userId = $this->session->userdata('user_id');
        if (!$userId) {
            return false;
        }

        $existingItem = $this->db->table('cart')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->get();

        if ($existingItem) {
            return $this->db->table('cart')
                ->where('cart_id', $existingItem['cart_id'])
                ->update(['quantity' => $existingItem['quantity'] + 1]);
        } else {
            $data = [
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1
            ];
            return $this->db->table('cart')->insert($data);
        }
    }

    public function get_cart_items($userId)
    {
        return $this->db->table('cart')
            ->select('cart.quantity, products.product_name, products.price, products.image_path, (cart.quantity * products.price) as total_price')
            ->join('products', 'cart.product_id = products.product_id')
            ->where('cart.user_id', $userId)
            ->get_all();
    }
}
