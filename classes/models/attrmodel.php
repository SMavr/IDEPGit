<?php
defined("EXEC") or ("You do not have access to that file");
require_once ROOT.'classes'.DS.'tables'.DS.'userinfo.php';

//this model manipulates attributes 
class AttrModel extends Logic{
   
    public function __construct() {
        parent::__construct();
    }
    
    //get one attribute by id
    public function getAttr($id){
        $this->db->setQuery("SELECT * FROM attribute WHERE attr_id=".$id);
        if($this->db->getNumRows()==1){
            return new AttrInfo($this->db-> getRow());
        }
        return false;
    }
    
   // get all attributes
    public function getAttrs(){
        $attrs=array();
        $this->db->setQuery("SELECT * FROM attribute");
        if($this->db->getNumRows()>0){
            foreach ($this->db->getRows() as $key => $attrs){
                $users[$attrs->attr_id]= new AttrInfo($attrs);
            }
            return $attrs;}
            return false;
    }
    
    
    //insert a new attribute
    public function insertAttr($info){
            $attr=new AttrInfo($info);
            $this->db->setQuery("INSERT INTO user (attr_title)
                               VALUES ('$attr->attr_title')");
        
        
    }
    
}

?>

