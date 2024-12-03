<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Cart_model extends Model
{
    public function add_to_cart($productId)
    {
        $userId = $this->session->userdata('user_id');
        if (!$userId) {
            return false; // User must be logged in
        }

        // Check if the product is already in the cart
        $existingItem = $this->db->table('cart')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->get();

        if ($existingItem) {
            // Update quantity if product exists
            return $this->db->table('cart')
                ->where('cart_id', $existingItem['cart_id'])
                ->update(['quantity' => $existingItem['quantity'] + 1]);
        } else {
            // Add new product to cart
            $data = [
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1
            ];
            return $this->db->table('cart')->insert($data);
        }
    }
}
