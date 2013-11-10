<?php
//Storing the possible values for one question

defined("EXEC") or ("You do not have access to that file");



class QvaluesInfo extends Logic{
   public $qv_id=null;
   public $qv_value=null;
   public $qv_text=null;
   public $question_id=null;
   
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
