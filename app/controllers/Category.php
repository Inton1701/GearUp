<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Category extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        $this->call->model('category_model');

    }
    // loadin categorys page
    public function category()
    {
        $this->call->view('admin/category');
    }
    // fetch categorys all categorys
    public function category_list(){
        $categories = $this->category_model->get_categories();
        if ($categories) {
            echo json_encode([
                'status' => 'success',
                 'data' => $categories
                ]);
        } else {

            echo json_encode([
                'status' => 'error',
                 'message' => 'No category found.'
                ]);
        }

    }


    public function add_category(){
        if ($this->form_validation->submitted()) {
            $category_name = $this->io->post('category_name');
            $category_status = $this->io->post('category_status');

            if($this->category_model->add_categories($category_name, $category_status)){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Category  successfully add'
                ]);
            }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to add category'
                ]);

            }
        }
    }
    public function get_category($id)
    {
        // Fetch category from the model
        $category = $this->category_model->get_one_category($id);
    
        // Check if category exists
        if ($category) {
            // Return category data if found
            echo json_encode([
                'status' => 'success',
                'data' => $category
            ]);
        } else {
            // Return an error if category not found
            echo json_encode([
                'status' => 'error',
                'message' => 'Category not found'
            ]);
        }
    }

    public function update_category(){
        if ($this->form_validation->submitted()) {
            $category_id = $this->io->post('category_id');
            $category_name = $this->io->post('category_name');
            $category_status = $this->io->post('category_status');

            if($this->category_model->update_categories($category_id, $category_name, $category_status)){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Category  successfully updated'
                ]);
            }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to update category'
                ]);

            }
        }
    }
    
    public function delete_category($id){
        if(!$id){
            echo json_encode([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
            return;
        }
        if($this->category_model->delete_categories($id)){
            echo json_encode([
                'status' => 'success',
                'message' => 'Categroy successfully deleted'
        ]);
         }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to delete category'
            ]);

         }
        }

        public function get_products_by_category($categoryId) {
            if (!is_numeric($categoryId)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid category ID'
                ]);
                return;
            }
        
            $products = $this->category_model->get_products_by_category($categoryId);
        
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