<?php
defined("EXEC") or ("You do not have access to that file");
require_once ROOT.'classes'.DS.'tables'.DS.'userinfo.php';

//this model manipulates attributes 
class UserToAttrModel extends Logic{
   
    public function __construct() {
        parent::__construct();
    }
    
 //get all the attrs of a user
    public function getUserAttrs($id){
        $this->db->setQuery("SELECT * FROM usertoattr WHERE user_id=".$id);
        if($this->db->getNumRows()==1){
            return new UserInfo($this->db-> getRow());
        }
        return false;
    }
    
    //get all the user of an Attribute
    public function getAttrUsers($id){
        $this->db->setQuery("SELECT * FROM usertoattr WHERE attr_id=".$id);
        if($this->db->getNumRows()==1){
            return new UserInfo($this->db-> getRow());
        }
        return false;
    }
    
    //select all from UserToAttr
    public function getUserToAttr(){
        $users=array();
        $this->db->setQuery("SELECT * FROM usertoattr");
        if($this->db->getNumRows()>0){
            foreach ($this->db->getRows() as $key => $user){
                $users[$user->user_id]= new UserInfo($user);
            }
            return $users;}
            return false;
    }
    
    
    //insert a new attribute to a user
    public function insertUserToAttr($user_id,$attr_id){
            $this->db->setQuery("INSERT INTO usertoattr (user_id, attr_id)
                               VALUES ('$user_id','$attr_id')");
        
        
    }    
    
    
}
?>
