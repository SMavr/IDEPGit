<?php

//this model manipulates ideas
class IdeaModel extends Logic{
    public function __construct() {
        parent::__construct();
    }
    //get ideas by id
    public function  getIdea($id){
        $this->db->setQuery("SELECT * FROM idea WHERE idea_id=".$id);
        if($this->db->getNumRows()==1){
            return new IdeaInfo($this->db-> getRow());
        }
        return false;
    }
    
    public function getIdeas(){
        $ideas=array();
        $this->db->setQuery("SELECT * FROM idea");
        if($this->db->getNumRows()>0){
            foreach ($this->db->getRows() as $key => $idea){
                $ideas[$idea->idea_id]= new IdeaInfo($idea);
            }
            return $ideas;}
            return false;
    }
    
    //not tested
    public function insertIdea($idea_info){
            $idea=new IdeaInfo($idea_info);
            $this->db->setQuery("INSERT INTO idea (title, idea_disc)
                               VALUES ('$idea->title','$idea->idea_disc')");
}
}
?>
