<?php
//this model manipulates the categories
// every cotagory contains questions according to a specific thema
class CategoryModel extends Logic {
public function __construct() {
        parent::__construct();
    }
    //get the category by id
    public function getCategory($id){
        $this->db->setQuery("SELECT * FROM category WHERE category_id=".$id);
        if($this->db->getNumRows()==1){
            return new CategoryInfo($this->db-> getRow());
        }
        return false;
    }
    
    //get all categories
    public function getCatagories(){
        $categories=array();
        $this->db->setQuery("SELECT * FROM category");
        if($this->db->getNumRows()>0){
            foreach ($this->db->getRows() as $key => $category){
                $categories[$category->category_id]= new CategoryInfo($category);
            }
            return $categories;}
            return false;
    }
    
    //insert category not tested
    public function insertCategory($category_info){
            $category=new CategoryInfo($category_info);
            $this->db->setQuery("INSERT INTO category (ctitle, cweight)
                               VALUES ('$category->ctitle','$category->cweight')");
        
        
    }
    }

?>
