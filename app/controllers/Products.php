<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Products extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        $this->call->model('products_model');
        $this->call->library('upload');
    }
    // loadin products page
    public function getList()
    {
        $this->call->view('admin/products');
    }
    // fetch products all products
    public function list_products()
    {
        $products = $this->products_model->get_products();
        if ($products) {
            echo json_encode([
                'status' => 'success',
                'data' => $products
            ]);
        } else {

            echo json_encode([
                'status' => 'error',
                'message' => 'No users found.'
            ]);
        }
    }
    // add product
    public function add_product()
    {
        $data['categories'] = $this->products_model->get_categories();
        $data['brands'] = $this->products_model->get_brands();
        $this->call->view('admin/add_products', $data);
    }

    public function create_product()
    {
        if ($this->form_validation->submitted()) {

            $product_name = $this->io->post('product-name');
            $performance = $this->io->post('performance');
            $category = $this->io->post('category');
            $brand = $this->io->post('brand');
            $description = $this->io->post('description');
            $price = $this->io->post('price');
            $cost = $this->io->post('cost');
            $quantity = $this->io->post('quantity');
            $quantity_alert = $this->io->post('quantity-alert');


            $upload = new Upload($_FILES['product-image']);
            $upload->set_dir('./public/userdata/img/')
                ->allowed_extensions(['jpg', 'jpeg', 'png', 'gif'])
                ->encrypt_name();


            if ($upload->do_upload()) {
                $image_path = $upload->get_filename();
            } else {

                $data['errors'] = $upload->get_errors();
                $this->call->view('admin/add_products', $data);
                return; // Stop further execution if upload fails
            }

            // Insert product into the database with image path
            if ($this->products_model->create_product(
                $product_name,
                $category,
                $brand,
                $performance,
                $description,
                $price,
                $cost,
                $quantity,
                $quantity_alert,
                $image_path
            )) {
                redirect(base_url() . 'admin/products'); // Redirect to the product list page
            } else {
                // Handle the failure and redirect to the add product page
                redirect(base_url() . 'admin/add-products');
            }
        }
    }


    public function get_category($id)
    {
        $category = $this->category_model->get_one_category($id);

        if ($category) {
            echo json_encode([
                'status' => 'success',
                'data' => $category
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Category not found'
            ]);
        }
    }

    public function get_product($id)
    {
        $product = $this->products_model->get_one_product($id);
        $categories = $this->products_model->get_categories();
        $brands = $this->products_model->get_brands();
        if ($product) {
            echo json_encode([
                'status' => 'success',
                'data' => [ 
                    'product' => $product,
                    'categories' => $categories,
                    'brands' => $brands
                ]
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'product not found'
            ]);
        }
    }


    public function update_product()
    {

        if ($this->form_validation->submitted()) {
            $product_id = $this->io->post('product_id');
            $product_name = $this->io->post('product_name');
            $performance = $this->io->post('performance');
            $description = $this->io->post('product_description');
            $price = $this->io->post('price');
            $cost = $this->io->post('cost');
            $quantity = $this->io->post('quantity');
            $quantity_alert = $this->io->post('quantity_alert');
            $brand = $this->io->post('brand');
            $category = $this->io->post('category');
            $updated_at = date('Y-m-d H:i:s');

            $upload = new Upload($_FILES['product-image']);
            $upload->set_dir('./public/userdata/img/')
                ->allowed_extensions(['jpg', 'jpeg', 'png', 'gif'])
                ->encrypt_name();


            if ($upload->do_upload()) {
                $image_path = $upload->get_filename();
            } else {

                $data['errors'] = $upload->get_errors();
                $this->call->view('admin/add_products', $data);
                return;
            }

            if ($this->products_model->update_products($product_id, $product_name, $performance,$description, $price,$cost, $quantity, $quantity_alert, $brand, $category, $image_path, $updated_at)) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Product was successfully updated'
                ]);
            } else {
                // Pass the error message to json
                $error = $this->db->error();
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Product update failed: ' . $error['message']
                ]);
            }
        }
    }
    public function delete_product($id)
    {
        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
        }
        if ($this->products_model->delete_products($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Product successfully deleted'
            ]);
        }
    }
    public function get_product_by_categories($category){
        $product = $this->products_model->get_products_by_category($category);
        if(!$category){
            echo json_encode([
                'status' => 'error',
                'message' => 'No Product Found Under this Categroy'
            ]);
            return;
        }else{
            echo json_encode([
                'status' => 'success',
                'data' => [ 
                    'product' => $product,
          
                ]
            ]);
        }
    }   


public function viewProduct($id)
{
    // Fetch the product details using the model
    $product = $this->products_model->get_one_product($id);

    if ($product) {
        // Render the view product page with the product details
        $this->call->view('mainpage/view-product', ['product' => $product]);
    } else {
        // If the product is not found, show a 404 error page
        $this->call->view('errors/error_404');
    }
}

public function view_product($id)
{
    $product = $this->products_model->get_one_product($id);

    if ($product) {
        $categories = $this->products_model->get_categories();
        $brands = $this->products_model->get_brands();

        // Fetch related products
        $related_products = $this->products_model->get_related_products($product['category_id'], $id);

        $data = [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'related_products' => $related_products,
        ];

        // Load the view and pass data
        $this->call->view('mainpage/view-product', $data);
    } else {
        // Redirect or show a 404 page if the product does not exist
        show_404();
    }
}



    

}
