<?php

//Storing information for an Idea
defined("EXEC") or ("You do not have access to that file");


class IdeaInfo extends Logic{
public $idea_id=null;
public $title=null; //Maybe I have to change that to idea_title
public $idea_disc=null; //Needs to be changes to idea_desc
    
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
