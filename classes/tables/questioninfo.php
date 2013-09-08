<?php

defined("EXEC") or ("You do not have access to that file");
require LOGIC;


//storing the info of a question
class QuestionInfo extends Logic{
   public $question_id=null;
   public $qtext=null;
   public $qweight=null;
   public $cid=null;
   public $number=null;
   
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
