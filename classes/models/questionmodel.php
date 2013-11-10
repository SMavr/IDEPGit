<?php

//this model manipulates questions 
defined("EXEC") or ("You do not have access to that file");
require_once ROOT . 'classes' . DS . 'tables' . DS . 'questioninfo.php';

//this model manipulates questions 
class QuestionModel extends Logic
{
    public function __construct()
    {
        parent::__construct();
    }

    /*select a question by id
     * @param $question_id: the id of a question
     * @return $QuestionInfo: object containing question information
     */
    public function getQuestion($question_id)
    {
        $this->db->setQuery("SELECT * FROM question WHERE question_id=" . $question_id);
        if ($this->db->getNumRows() == 1)
        {
            return new QuestionInfo($this->db->getRow());
        }
        return false;
    }

    /*sellect all questions from the database
     * @return $questions: array containing all the QuestionInfo objects 
     * that were retrieved from the database
     */
    public function getQuestions()
    {
        $questions = array();
        $this->db->setQuery("SELECT * FROM question");
        if ($this->db->getNumRows() > 0)
        {
            foreach ($this->db->getRows() as $key => $question)
            {
                $questions[$question->question_id] = new QuestionInfo($question);
            }
            return $questions;
        }
        return false;
    }

    /*insert a new question into the database
     * $param $questioninfo: array containing new question
     */
    public function insertQuestion($questioninfo)
    {
        $question = new QuestionInfo($questioninfo);
        $this->db->setQuery("INSERT INTO question (qtext, qweight, cid, number)
                               VALUES ('$question->qtext','$question->qweight','$question->cid','$question->number')");
    }

}

?>
