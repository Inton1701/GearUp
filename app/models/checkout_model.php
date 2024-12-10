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
        $this->db->begin_transaction();

        try {
            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $totalPrice += $item['quantity'] * $item['price'];
            }

            $orderId = $this->db->table('orders')->insert([
                'user_id' => $userId,
                'status' => 'Pending',
                'total_price' => $totalPrice,
                'payment_method' => 'Cash on Delivery',
                'address_id' => $addressId,
            ]);

            foreach ($cartItems as $item) {
                $this->db->table('ordered_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            $this->db->commit();
            return $orderId;
        } catch (Exception $e) {
            $this->db->rollback();
            error_log('Order creation failed: ' . $e->getMessage());
            return false;
        }
    }
}
