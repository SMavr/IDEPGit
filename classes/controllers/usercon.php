<?php

//Controller of users
defined("EXEC") or ("You do not have access to that file");
require_once MODELS . 'usermodel.php';
require_once MODELS.'attrmodel.php';

class UserCon {

    public $usermodel = null;
    public $attrmodel = null;
    private $attr_to_user_model = null;  // (user_id, attribute_id) connection between users and attributes (Manager....etc)

    public function __construct() {
        $this->usermodel = new UserModel();
        $this->attrmodel = new AttrModel();
    }

    //public function insert new user and reload user view
    public function controlInsert($info, $attr) {// $attr is an array with infos (user_id, attribute_id)
        $this->usermodel->insertUser($info); // call insert user according to your info
        //retrieve the new id of the user
        //instatiate new AttrToUserModel Objects (user_id, attribute_id) according to the length of the array $attr
        // insert for every AttrToUserModel object the values in the table of the mySqlDatabase
        // select all the users again containing also the new one
        // select all the attributes again for every user 
        // reload the same php file
    }

    //update an existing user and reload user view
    //delete a user and reload user view
    
    //load users from the database
    public function loadUsers() {
      //  $users_array = array();
        $users_array = $this->usermodel->getUsers();
        return $users_array;
    }
    
    //load attributes
    public function loadAttrs(){
     //   $attrs_array=array();
        $attrs_array=  $this->attrmodel->getAttrs();
        return $attrs_array;
    }
    
    

}

?>
