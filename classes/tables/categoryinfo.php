<?php
//Storing information about one category
defined("EXEC") or ("You do not have access to that file");


class CategoryInfo extends Logic{
public $category_id=null;
public $ctitle=null;
public $cweight=null;// optional? 


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
