<?php

//this model manipulates questions 
defined("EXEC") or ("You do not have access to that file");
require_once ROOT.'classes'.DS.'tables'.DS.'userinfo.php';

//this model manipulates users 
class QuestionModel extends Logic{
   
    public function __construct() {
        parent::__construct();
    }
    
    //select a question by id
    public function getQuestion($id){
        $this->db->setQuery("SELECT * FROM question WHERE question_id=".$id);
        if($this->db->getNumRows()==1){
            return new QuestionInfo($this->db-> getRow());
        }
        return false;
    }
    
    //sellect all questions
    public function getQuestions(){
        $questions=array();
        $this->db->setQuery("SELECT * FROM question");
        if($this->db->getNumRows()>0){
            foreach ($this->db->getRows() as $key => $questions){
                $questions[$questions->question_id]= new UserInfo($questions);
            }
            return  $questions;}
            return false;
    }
    
    //insert a new question
    public function insertQuestion($questioninfo){
            $question=new QuestionInfo($questioninfo);
            $this->db->setQuery("INSERT INTO question (qtext, qweight, cid, number)
                               VALUES ('$question->qtext','$question->qweight','$question->cid','$question->number')");
        
        
    }
    
}
?>
