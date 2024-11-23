
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products_model extends Model {
    // read data
	public function get_products() {
       return $this->db->table('products as p')
                    ->inner_join('categories as c', 'p.category_id=c.category_id')
                    ->inner_join('brand as b', 'p.brand_id=b.brand_id')->get_all();
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
    public function create_product($product_name, $category, $brand, $description, $price, $quantity, $quantity_alert, $image_path){
        $data = array(
            'product_name' => $product_name,
            'category_id' => $category,
            'brand_id' => $brand,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity,
            'quantity_alert' => $quantity_alert,
            'image_path' => $image_path,
            'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->table('products')->insert($data);
    }

    // create data
    // public function create($last_name, $first_name, $email, $gender,$address){      
    //     $data = array(
    //         'aamj_last_name' => $last_name,
    //         'aamj_first_name' => $first_name,
    //         'aamj_email' => $email,
    //         'aamj_gender' => $gender,
    //         'ammj_address' => $address,
    //         );

    //    return  $this->db->table('aamj_users')->insert($data);
     
    // }
    // // fetch data
    // public function fetch_user($id){
    //     return $this->db->table('aamj_users')->where('id', $id)->get();
    // }
    // // update data
    // public function update($id, $last_name, $first_name, $email, $gender, $address){
    //     $data = array(
    //         'aamj_last_name' => $last_name,
    //         'aamj_first_name' => $first_name,
    //         'aamj_email' => $email,
    //         'aamj_gender' => $gender,
    //         'ammj_address' => $address,
    //         );
        
    //  return  $this->db->table('aamj_users')->where('id', $id)->update($data);
    // }
    // // delete data
    // public function delete($id){
    //  return  $this->db->table('aamj_users')->where("id", $id)->delete();
    // }

}   
?>