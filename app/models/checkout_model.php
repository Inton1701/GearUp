<?php
class Checkout_model extends Model
{
    public function get_user_addresses($userId)
    {
        return $this->db->table('address')
            ->where('user_id', $userId)
            ->get_all();
    }

    public function create_order($userId, $addressId, $cartItems)
    {
        // Calculate total price
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['quantity'] * $item['price'];
        }

        // Insert order
        $orderId = $this->db->table('orders')->insert([
            'user_id' => $userId,
            'status' => 'Pending',
            'total_price' => $totalPrice,
            'payment_method' => 'Cash on Delivery',
        ]);

        // Check if order was created successfully
        if (!$orderId) {
            error_log('Failed to create order record.');
            return false;
        }

        // Insert ordered items
        foreach ($cartItems as $item) {
            $result = $this->db->table('ordered_items')->insert([
                'order_id' => $orderId,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            // Check if item insert was successful
            if (!$result) {
                error_log("Failed to insert item with product_id: {$item['product_id']} for order_id: $orderId.");
                return false; // Return false if any item fails to insert
            }
        }

        // All operations succeeded
        return $orderId;
    }
}
