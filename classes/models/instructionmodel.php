<?php
defined("EXEC") or ("You do not have access to that file");
require_once ROOT.'classes'.DS.'tables'.DS.'userinfo.php';

//this model manipulates instructions
class instructionmodel {
  public function __construct() {
        parent::__construct();
    }  
    
   //get instructions by id
    public function  getInst($id){
        $this->db->setQuery("SELECT * FROM instructions WHERE instructions_id=".$id);
        if($this->db->getNumRows()==1){
            return new UserInfo($this->db-> getRow());
        }
        return false;
    }
    
    // select all instructions
    public function getInsts(){
        $users=array();
        $this->db->setQuery("SELECT * FROM instructions");
        if($this->db->getNumRows()>0){
            foreach ($this->db->getRows() as $key => $user){
                $users[$user->user_id]= new UserInfo($user);
            }
            return $users;}
            return false;
    }
    
    //insert an instruction to the database (id autoincrement)
    public function insertInst($instinfo){
            $inst=new InstInfo($instinfo); //create a new InstInfo object
            $this->db->setQuery("INSERT INTO instructions (instructions)
                               VALUES ('$inst->instructions')");
        
        
    }
}

?>
