<?php
 //this model manipulates the answers of evaluator
 
class AnswerModel extends Logic{
    public function __construct() {
        parent::__construct();
    }
      //get the answer by id
    public function getAnswer($id){
        $this->db->setQuery("SELECT * FROM answer WHERE answer_id=".$id);
        if($this->db->getNumRows()==1){
            return new AnswerInfo($this->db-> getRow());
        }
        return false;
    }
    
    
    //get the all the answers
    public function getAnswers(){
        $answers=array();
        $this->db->setQuery("SELECT * FROM answer");
        if($this->db->getNumRows()>0){
            foreach ($this->db->getRows() as $key => $answer){
                $answers[$answer->answer_id]= new AnswerInfo($answer);
            }
            return $answers;}
            return false;
    }
  
    
    //insert an answer
    public function insertAnswer($answer_info){
            $answer=new AnswerInfo($answer_info);
            $this->db->setQuery("INSERT INTO answer (avalue,uid,iid,question_id)
                               VALUES ('$answer->avalue','$answer->uid','$answer->iid','$answer->question_iid)");
        
        
    }
}

?>
