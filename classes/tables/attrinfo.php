<?php

//storing attributes (title,value)
defined("EXEC") or ("You do not have access to that file");
require LOGIC;

class AttrInfo extends Logic{
public $attr_id;
public $attr_title;
    
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
