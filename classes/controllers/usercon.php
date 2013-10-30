<?php

//Controller of users
defined("EXEC") or ("You do not have access to that file");
require_once MODELS . 'usermodel.php';
require_once MODELS . 'attrmodel.php';
require_once MODELS . 'usertoattrmodel.php';

/*
 * This class manages the user management pages
 */

class UserCon
{

    public $usermodel = null;
    public $attrmodel = null;
    private $attr_to_user_model = null;  // (user_id, attribute_id) connection between users and attributes (Manager....etc)

    public function __construct()
    {
        $this->usermodel = new UserModel();
        $this->attrmodel = new AttrModel();
        $this->attr_to_user_model = new UserToAttrModel();
    }

    /*
     * inserts a user into the database
     * @param $info: array of a User (new id, name, password, role)
     * @param $attr_to_user_model: array of an Attribute (user id, attribute id)
     */
    public function controlInsert($info, $attr_to_user_model)
    {
        $this->usermodel->insertUser($info);
        $this->attrmodel->insertAttr($attr_to_user_model);
    }

    //update an existing user and reload user view
    //delete a user and reload user view

    /*
     * load users from the database
     * @return $users_array: current users
     */
    public function loadUsers()
    {
        $users_array = $this->usermodel->getUsers();
        return $users_array;
    }

    /*
     * load attributes from the database
     * @return $attrs_array: current users
     */
    public function loadAttrs()
    {
        $attrs_array = $this->attrmodel->getAttrs();
        return $attrs_array;
    }

    /*
     * returns an array of AttrInfo Objectes according to the user_id
     * @param $user_id: Int the id of the user
     * @return $attrs_titles: Array[AttrInfo]
     */
    public function loadAttrsPerUser($user_id)
    {
        $attrs_per_user_attrinfos = array(); //AttrInfo Array
        $attrs_per_user = $this->attr_to_user_model->getUserAttrs($user_id); //UserToAttrInfo Array
       
        foreach ($attrs_per_user as $value)
        {

            $one_user_attr_id = $this->attr_to_user_model->get('attr_id', $value);
            $attr_per_user_attrinfo = $this->attrmodel->getAttr($one_user_attr_id);
            $attrs_per_user_attrinfos[] = $attr_per_user_attrinfo;
        }

      

        return $attrs_per_user_attrinfos;
    }

    /*
     * load the attributes of one User
     * @param $user_id: Int the id of the user
     * @return $attrs_per_user_imploded: String containing
     * the attributes of the user seperated by commas
     */
    public function loadAttrsPerUserAsString($user_id)
    {
        $attrs = array(); //String array which will contain the string titles of the attribute
        $attrs_per_user_attrinfos=$this->loadAttrsPerUser($user_id);
         foreach ($attrs_per_user_attrinfos as $value)
        {
            $attrs[] = $this->attrmodel->get('attr_title', $value);
        }
        $attrs_per_user_imploded = implode(",",$attrs);
        return $attrs_per_user_imploded;
    }

    public function loadUsersPerAttr($attr_id)
    {
//        $attrs = array(); //String array which will contain the string titles of the attribute
//        $attrs_per_user_attrinfos=$this->attr_to_user_model->getAttrUsers($attr_id);
//        foreach ($attrs_per_user_attrinfos as $value)
//        {
//            $attrs[] = $this->attrmodel->get('attr_title', $value);
//        }
//        $users_per_attrs_userinfo_array = array(); // UserInfo array
//        $users_per_attrs_usertoattrinfo_array =
//                $this->attr_to_user_model->getAttrUsers($attr_id); //UserToAttrInfo Array
//        $users=array(); // 
    }

}

?>
