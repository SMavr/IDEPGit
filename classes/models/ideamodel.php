<?php

//this model manipulates ideas
class IdeaModel extends Logic{
    
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
}

?>
