<?php

defined("EXEC") or ("You do not have access to that file");
require_once ROOT . 'classes' . DS . 'tables' . DS . 'usertoattrinfo.php';

//this model manipulates attributes 
class UserToAttrModel extends Logic
{
    public function __construct()
    {
        parent::__construct();
    }

    /*gets all attributes from a specific user
     * @param $user_id: the id of the user
     * @return $user_attrs: array containing 
     * objects UserToAttrInfo (user_id, attr_id)
     */
    public function getUserAttrs($user_id)
    {
        $user_attrs = array();
        $this->db->setQuery("SELECT * FROM usertoattr WHERE user_id=" . $user_id);
        if ($this->db->getNumRows() > 0)
        {
            foreach ($this->db->getRows() as $key => $user_attr)
            {
                $user_attrs[$user_attr->attr_id] = new UserToAttrInfo($user_attr);
            }

            return $user_attrs;
        }
        return false;
    }

    /*get all the users with a specific attribute
     * @param $attr_id: the id of the specific 
     * attribute
     * @return $attr_users: array containig objects
     * UserToAttrInfo (user_id, attr_id) 
     */
    public function getAttrUsers($attr_id)
    {
        $attr_users = array();
        $this->db->setQuery("SELECT * FROM usertoattr WHERE attr_id=" . $attr_id);
        if ($this->db->getNumRows() > 0)
        {
            foreach ($this->db->getRows() as $key => $user_attr)
            {
                $attr_users[$user_attr->user_id] = new UserToAttrInfo($user_attr);
            }

            return $attr_users;
        }
        return false;
    }

    /*select all from UserToAttr
     *@return $users: array that contains all the objects
     * UserToAttrInfo(user_id, attr_id) retrieved from the 
     * database
     */
    public function getUserToAttr()
    {
        $users = array();
        $this->db->setQuery("SELECT * FROM usertoattr");
        if ($this->db->getNumRows() > 0)
        {
            foreach ($this->db->getRows() as $key => $user_attr)
            {
                $users[$user_attr->user_id] = new UserToAttrInfo($user_attr);
            }
            return $users;
        }
        return false;
    }

    //insert a new attribute to a user
    public function insertUserToAttr($user_id, $attr_id)
    {
        $this->db->setQuery("INSERT INTO usertoattr (user_id, attr_id)
                               VALUES ('$user_id','$attr_id')");
    }

}

?>
