<?php

//Controller of users
defined("EXEC") or ("You do not have access to that file");
require_once MODELS . 'usermodel.php';
require_once MODELS . 'attrmodel.php';
require_once MODELS.'usertoattrmodel.php';

/* 
 * This class manages the user management pages
 */
class UserCon {

    public $usermodel = null;
    public $attrmodel = null;
    private $attr_to_user_model = null;  // (user_id, attribute_id) connection between users and attributes (Manager....etc)

    public function __construct() {
        $this->usermodel = new UserModel();
        $this->attrmodel = new AttrModel();
        $this->attr_to_user_model=new UserToAttrModel();
    }

    /*
     * inserts a user into the database
     * @param $info: array of a User (new id, name, password, role)
     * @param $attr_to_user_model: array of an Attribute (user id, attribute id)
     */
    public function controlInsert($info, $attr_to_user_model) {
        $this->usermodel->insertUser($info);
        $this->attrmodel->insertAttr($attr_to_user_model);
    }

    //update an existing user and reload user view
    //delete a user and reload user view

    /*
     * load users from the database
     * @return $users_array: current users
     */
    public function loadUsers() {
        $users_array = $this->usermodel->getUsers();
        return $users_array;
    }

    /*
     * load attributes from the database
     * @return $attrs_array: current users
     */

    public function loadAttrs() {
        $attrs_array = $this->attrmodel->getAttrs();
        return $attrs_array;
    }  
    
    /*
     * load the attributes of one User
     * @param $user_id: the id of the user
     * @return $attrs_per_user_imploded: string containing
     * the attributes of the user with commas imploded
     */
    public function loadAttrPerUser($user_id){
        $attrs_per_user_imploded=null; 
        $attrs_per_user=  $this->attr_to_user_model->getUserAttrs($user_id);
        echo 'kati'.$attrs_per_user[0];
     //   foreach($attrs_per_user as $value){
          
         //   $one_user_attr=  $this->attrmodel->getAttr($value['attr_id']);
        //    $attrs_per_user_imploded=implode(",",$one_user_attr);
        
       // }
            return $attrs_per_user_imploded;
        
        
    }
}

?>
