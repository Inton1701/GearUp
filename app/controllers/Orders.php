<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Orders extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        $this->call->model('order_model');

    }
    // loadin orders page
    public function order()
    {
        $this->call->view('admin/orders');
    }
    // fetch orders all orders
    public function order_list(){
        $orders = $this->order_model->get_all_orders();
        if ($orders) {
            echo json_encode([
                'status' => 'success',
                 'data' => $orders
                ]);
        } else {

            echo json_encode([
                'status' => 'error',
                 'message' => 'No order found.'
                ]);
        }

    }


    public function add_order(){
        if ($this->form_validation->submitted()) {
            $order_name = $this->io->post('order_name');
            $order_status = $this->io->post('order_status');

            if($this->order_model->add_categories($order_name, $order_status)){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'order  successfully add'
                ]);
            }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to add order'
                ]);

            }
        }
    }
    public function get_order($id)
    {
        // Fetch order from the model
        $order = $this->order_model->get_one_order($id);
    
        // Check if order exists
        if ($order) {
            // Return order data if found
            echo json_encode([
                'status' => 'success',
                'data' => $order
            ]);
        } else {
            // Return an error if order not found
            echo json_encode([
                'status' => 'error',
                'message' => 'order not found'
            ]);
        }
    }

    public function update_order(){
        if ($this->form_validation->submitted()) {
            $order_id = $this->io->post('order_id');
            $order_name = $this->io->post('order_name');
            $order_status = $this->io->post('order_status');

            if($this->order_model->update_categories($order_id, $order_name, $order_status)){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'order  successfully updated'
                ]);
            }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to update order'
                ]);

            }
        }
    }
    
    public function delete_order($id){
        if(!$id){
            echo json_encode([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
            return;
        }
        if($this->order_model->delete_categories($id)){
            echo json_encode([
                'status' => 'success',
                'message' => 'Categroy successfully deleted'
        ]);
         }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to delete order'
            ]);

         }
        }

        public function get_products_by_order($orderId) {
            if (!is_numeric($orderId)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid order ID'
                ]);
                return;
            }
        
            $products = $this->order_model->get_products_by_order($orderId);
        
            if ($products) {
                echo json_encode([
                    'status' => 'success',
                    'data' => $products
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No products found for this order.'
                ]);
            }
        }
        
    }