<?php
defined("EXEC") or ("You do not have access to that file");
require_once ROOT.'classes'.DS.'tables'.DS.'userinfo.php';

//this model manipulates users 
class UserModel extends Logic{
   
    public function __construct() {
        parent::__construct();
    }
    
    //get the user by id
    public function getUser($id){
        $this->db->setQuery("SELECT * FROM user WHERE user_id=".$id);
        if($this->db->getNumRows()==1){
            return new UserInfo($this->db-> getRow());
        }
        return false;
    }
    
    public function getUsers(){
        $users=array();
        $this->db->setQuery("SELECT * FROM user");
        if($this->db->getNumRows()>0){
            foreach ($this->db->getRows() as $key => $user){
                $users[$user->user_id]= new UserInfo($user);
            }
            return $users;}
            return false;
    }
    
    public function insertUser($userinfo){
            $user=new UserInfo($userinfo);
            $this->db->setQuery("INSERT INTO user (username, password)
                               VALUES ('$user->username','$user->password')");
        
        
    }
    
}

?>
