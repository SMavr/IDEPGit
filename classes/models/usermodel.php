<?php

defined("EXEC") or ("You do not have access to that file");
require_once ROOT . 'classes' . DS . 'tables' . DS . 'userinfo.php';

//this model manipulates users 
class UserModel extends Logic
{
    public function __construct()
    {
        parent::__construct();
    }

    /* get the user by id
     * @param  $user_id: the id of the user
     * @return $UserInfo: Object containing all the
     * information for the user
     */
    public function getUser($user_id)
    {
        $this->db->setQuery("SELECT * FROM user WHERE user_id=" . $user_id);
        if ($this->db->getNumRows() == 1)
        {
            return new UserInfo($this->db->getRow());
        }
        return false;
    }

    /*
     * gets all the users from the base
     * @return $users: an array containing objects 
     * of UserInfo
     */
    public function getUsers()
    {
        $users = array();
        $this->db->setQuery("SELECT * FROM user");
        if ($this->db->getNumRows() > 0)
        {
            foreach ($this->db->getRows() as $key => $user)
            {
                $users[$user->user_id] = new UserInfo($user);
            }
            return $users;
        }
        return false;
    }

    /* insert a user into the database
     * @param $userinfo: array that contains
     *  information for a user
     */
    public function insertUser($userinfo)
    {
        $user = new UserInfo($userinfo);
        $this->db->setQuery("INSERT INTO user (username, password)
                               VALUES ('$user->username','$user->password')");
    }

}

?>
