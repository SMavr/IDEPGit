 <?php

//storing the answer of an Evaluator for a specific question from a specific Idea
defined("EXEC") or ("You do not have access to that file");


class AnswerInfo extends Logic{
public $answer_id=null;
public $avalue=null; //maybe we have to change that into answer_value
public $uid=null;// user_id
public $iid=null;// idea_id
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
