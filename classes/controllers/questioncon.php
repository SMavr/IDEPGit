<?php

defined("EXEC") or ("You do not have access to that file");
require_once MODELS . 'questionmodel.php';

/*
 * Manages the questions html page
 */
class QuestionCon
{
    /*
     * contains the question sql methods
     */
    public $questionmodel = null;

    public function __construct()
    {
        $this->questionmodel = new QuestionModel();
    }

    /*
     * loads questions for the database
     * @return $question_array the current questions
     * in the database
     */
    public function loadQuestions()
    {
        $question_array = $this->questionmodel->getQuestions();
        return $question_array;
    }

}

?>
