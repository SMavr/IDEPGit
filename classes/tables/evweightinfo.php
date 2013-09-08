<?php

//Storing the relative weight of an attribute for a question
defined("EXEC") or ("You do not have access to that file");
require LOGIC;

class EvweightInfo extends Logic{
public $question_id=null;
public $attr_id=null;
public $ev_value=null;
    
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
