<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Brand extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        $this->call->model('brand_model');
        $this->call->library('upload');
    }
    // loadin categorys page
    public function brand()
    {
        $this->call->view('admin/brand');
    }
    // fetch brands all brands
    public function brand_list(){
        $brands = $this->brand_model->get_brands();
        if ($brands) {
            echo json_encode([
                'status' => 'success',
                 'data' => $brands
                ]);
        } else {

            echo json_encode([
                'status' => 'error',
                 'message' => 'No brand found.'
                ]);
        }

    }


    public function add_brand(){
        if ($this->form_validation->submitted()) {
            $brand_name = $this->io->post('brand_name');
            $brand_status = $this->io->post('brand_status');

            $logo_path = null;
            if (isset($_FILES['brand_logo']) && $_FILES['brand_logo']['error'] === UPLOAD_ERR_OK) {
                $upload = new Upload($_FILES['brand_logo']);
                $upload->set_dir('./public/userdata/img/')
                       ->allowed_extensions(['jpg', 'jpeg', 'png', 'gif'])
                       ->encrypt_name();
    
                if ($upload->do_upload()) {
                    $logo_path = $upload->get_filename();
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => implode(', ', $upload->get_errors())
                    ]);
                    return;
                }
            }

            if($this->brand_model->add_brands($brand_name, $brand_status, $logo_path)){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'brand  successfully added'
                ]);
            }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to add brand'
                ]);

            }
        }
    }
    public function get_brand($id)
    {
        // Fetch brand from the model
        $brand = $this->brand_model->get_one_brand($id);
    
        // Check if brand exists
        if ($brand) {
            // Return brand data if found
            echo json_encode([
                'status' => 'success',
                'data' => $brand
            ]);
        } else {
            // Return an error if brand not found
            echo json_encode([
                'status' => 'error',
                'message' => 'brand not found'
            ]);
        }
    }

    public function update_brand(){
        if ($this->form_validation->submitted()) {
            $brand_id = $this->io->post('brand_id');
            $brand_name = $this->io->post('brand_name');
            $brand_status = $this->io->post('brand_status');

            $logo_path = null;
            if (isset($_FILES['brand_logo']) && $_FILES['brand_logo']['error'] === UPLOAD_ERR_OK) {
                $upload = new Upload($_FILES['brand_logo']);
                $upload->set_dir('./public/userdata/img/')
                       ->allowed_extensions(['jpg', 'jpeg', 'png', 'gif'])
                       ->encrypt_name();
    
                if ($upload->do_upload()) {
                    $logo_path = $upload->get_filename();
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => implode(', ', $upload->get_errors())
                    ]);
                    return;
                }
            }

            if($this->brand_model->update_brands($brand_id, $brand_name, $brand_status, $logo_path)){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'brand  successfully updated'
                ]);
            }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to update brand'
                ]);

            }
        }
    }
    
    public function delete_brand($id){
        if(!$id){
            echo json_encode([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
            return;
        }
        if($this->brand_model->delete_brands($id)){
            echo json_encode([
                'status' => 'success',
                'message' => 'Categroy successfully deleted'
        ]);
         }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to delete brand'
            ]);

         }
        }

       
        public function get_products_by_brand($brand_id) {
            if (!is_numeric($brand_id)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid category ID'
                ]);
                return;
            }
        
            $products = $this->brand_model->get_products_by_brand($brand_id);
        
            if ($products) {
                echo json_encode([
                    'status' => 'success',
                    'data' => $products
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No products found for this category.'
                ]);
            }
        }
        
}