<?php
defined("EXEC") or ("You do not have access to that file");

//Storing information about an instruction
class InstInfo extends Logic{
public $instruction_id;
public $instruction;
    
    public function __construct($data) {
       parent::__construct();
   
       if(is_object($data)){
           foreach ($data as $key=>$value){
               $this->$key=$value;
       }
       
       }
   
}
    
   
}

?>
