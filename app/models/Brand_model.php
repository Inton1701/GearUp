
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Brand_model extends Model {

    public function get_brands() {
        return $this->db->table('brand')->where_null('deleted_at')->get_all();

    }
    public function get_one_brand($id){

        return $this->db->table('brand')->where('brand_id',$id)->get();

    }
    
    public function add_brands($brand_name, $brand_status, $logo_path){
        $data =array(
            'brand_name' => $brand_name,
            'brand_status' => $brand_status,
            'brand_logo' => $logo_path,
        );

        return $this->db->table('brand')->insert($data);
    }
    public function update_brands($brand_id, $brand_name, $brand_status, $logo_path){
        $data =array(
            'brand_name' => $brand_name,
            'brand_status' => $brand_status,
            'brand_logo' => $logo_path,
            'update_at' => date('Y-m-d H:i:s')
        );

        return $this->db->table('brand')->where('brand_id', $brand_id)->update($data);
    }


    public function  delete_brands($brand_id){
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        
        return $this->db->table('brand')->where('brand_id', $brand_id)->update($data);

    }

    public function get_products_by_brand($brand_id) {
        // Validate category_id
        if (!is_numeric($brand_id)) {
            return []; // Return empty if invalid
        }
    
        // Fetch products
        return $this->db->table('products')
                        ->where('brand_id', $brand_id)
                        ->get_all(); // Ensure 'get_all()' is used for multiple rows
    }
    



}   
?>