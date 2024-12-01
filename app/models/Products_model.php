
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products_model extends Model {
    // read data
    public function get_products() {
        return $this->db->table('products as p')
            ->inner_join('categories as c', 'p.category_id=c.category_id')
            ->inner_join('brand as b', 'p.brand_id=b.brand_id')
            ->where_null('p.deleted_at') 
            ->get_all();
    }
    public function get_one_product($id){
        return $this->db->table('products as p')
        ->inner_join('categories as c', 'p.category_id=c.category_id')
        ->inner_join('brand as b', 'p.brand_id=b.brand_id')->where('product_id', $id)->get();;
    }
    public function get_categories(){
        return $this->db->table('categories')->get_all();
    }
    public function get_brands(){
        return $this->db->table('brand')->get_all();
    }
    public function create_product($product_name, $category, $brand, $performance, $description, $price,$cost, $quantity,  $quantity_alert, $image_path){
        $data = array(
            'product_name' => $product_name,
            'category_id' => $category,
            'brand_id' => $brand,
            'performance' => $performance,
            'description' => $description,
            'price' => $price,
            'cost' => $cost,
            'quantity' => $quantity,
            'quantity_alert' => $quantity_alert,
            'image_path' => $image_path,
            'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->table('products')->insert($data);
    }
    public function  update_products($product_id, $product_name,$performance, $description, $price, $cost, $quantity, $quantity_alert, $brand, $category, $image_path, $updated_at){
        $data = array(
            'product_name' => $product_name,
            'performance' => $performance,
            'description' => $description,
            'price' => $price,
            'cost' => $cost,
            'quantity' => $quantity,
            'quantity_alert' => $quantity_alert,
            'brand_id' => $brand,
            'category_id' => $category,
            'image_path' => $image_path,
            'updated_at' => $updated_at
        );
        
        return $this->db->table('products')->where('product_id', $product_id)->update($data);

    }
    public function  delete_products($product_id){
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        
        return $this->db->table('products')->where('product_id', $product_id)->update($data);

    }



}   
?>