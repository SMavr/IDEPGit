<?php

defined("EXEC") or ("You do not have access to that file");
require_once MODELS . 'questionmodel.php';
require_once MODELS . 'answermodel.php';

/*
 * Manages the questions html page
 */
class QuestionCon
{
    /*
     * contains the question sql methods
     */
    public $questionmodel = null;
    
    /*
     * contains the answer sql methods
     */
    public $answermodel = null;

    public function __construct()
    {
        $this->questionmodel = new QuestionModel();
        $this->answermodel = new AnswerModel();
    }
    
   
    /*
     * loads questions from the database
     * @return $question_array the current questions
     * in the database
     */
    public function loadQuestions()
    {
        $question_array = $this->questionmodel->getQuestions();
        return $question_array;
    }
    
    /*
     * loads answers for a specific question from the database
     * @param $id the id of the selected question
     * @return $answer_array the answers for the specific question
     */
    public function loadAnswersPerQuestion($id)
    {
      $answer_array=  $this->answermodel->getAnswersPerQuestion($id);
      return $answer_array; 
    }
}

?>
