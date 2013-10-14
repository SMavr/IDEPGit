<?php

defined("EXEC") or ("You do not have access to that file");
require_once ROOT . 'classes' . DS . 'tables' . DS . 'instinfo.php';

//this model manipulates instructions
class instructionmodel
{
    public function __construct()
    {
        parent::__construct();
    }

    /*get a specific intruction from the database
     * @param $instruction_id: the id of the construction
     * @return InstInfo: object containing the information from the 
     * retrieved instruction
     */
    public function getInst($instruction_id)
    {
        $this->db->setQuery("SELECT * FROM instructions WHERE instructions_id=" . $instruction_id);
        if ($this->db->getNumRows() == 1)
        {
            return new InstInfo($this->db->getRow());
        }
        return false;
    }

    /* select all instructions from the database
     * @return $instructions: array containing all the InstInfo objects,
     * that were retrieved from the database
     */
    public function getInsts()
    {
        $instructions = array();
        $this->db->setQuery("SELECT * FROM instructions");
        if ($this->db->getNumRows() > 0)
        {
            foreach ($this->db->getRows() as $key => $instruction)
            {
                $instructions[$instruction->instructions_id] = new InstInfo($instruction);
            }
            return $instructions;
        }
        return false;
    }

    /*insert an instruction to the database
     *@param $instinfo: array containing the information
     * for the new instruction to be inserted
     */
    public function insertInst($instinfo)
    {
        $inst = new InstInfo($instinfo); //create a new InstInfo object
        $this->db->setQuery("INSERT INTO instructions (instructions)
                               VALUES ('$inst->instructions')");
    }

}

?>
