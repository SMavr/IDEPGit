<?php
defined("EXEC") or ("You do not have access to that file");
require_once ROOT . 'classes' . DS . 'tables' . DS . 'ideainfo.php';

//this model manipulates ideas
class IdeaModel extends Logic
{
    public function __construct()
    {
        parent::__construct();
    }

    /*get ideas by id
     * @param $idea_id: the id of an idea
     * @return IdeaInfo: an object that contains information
     * for the idea, that was retrieved from the data base
     */
    public function getIdea($idea_id)
    {
        $this->db->setQuery("SELECT * FROM idea WHERE idea_id=" . $idea_id);
        if ($this->db->getNumRows() == 1)
        {
            return new IdeaInfo($this->db->getRow());
        }
        return false;
    }

    /* get all the ideas from the database
     * @param $ideas: array from IdeaInfos, objectes that contain
     * information from an idea
     */
    public function getIdeas()
    {
        $ideas = array();
        $this->db->setQuery("SELECT * FROM idea");
        if ($this->db->getNumRows() > 0)
        {
            foreach ($this->db->getRows() as $key => $idea)
            {
                $ideas[$idea->idea_id] = new IdeaInfo($idea);
            }
            return $ideas;
        }
        return false;
    }

    /* inserts a new idea into the database
     * @param $idea_info: array that contains information for
     * the new idea to be inserted into the databased
     */
    public function insertIdea($idea_info)
    {
        $idea = new IdeaInfo($idea_info);
        $this->db->setQuery("INSERT INTO idea (title, idea_disc)
                               VALUES ('$idea->title','$idea->idea_disc')");
    }

}

?>
