
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Category_model extends Model {

    public function get_categories() {
        return $this->db->table('categories')->where_null('delete_at')->get_all();

    }
    public function get_one_category($id){

        return $this->db->table('categories')->where('category_id',$id)->get();

    }
    
    public function add_categories($category_name, $category_status){
        $data =array(
            'category_name' => $category_name,
            'category_status' => $category_status,
        );

        return $this->db->table('categories')->insert($data);
    }
    public function update_categories($category_id, $category_name, $category_status){
        $data =array(
            'category_name' => $category_name,
            'category_status' => $category_status,
            'updated_at' => date('Y-m-d H:i:s')
        );

        return $this->db->table('categories')->where('category_id', $category_id)->update($data);
    }


    public function  delete_categories($category_id){
        $data = array(
            'delete_at' => date('Y-m-d H:i:s')
        );
        
        return $this->db->table('categories')->where('category_id', $category_id)->update($data);

    }



}   
?>