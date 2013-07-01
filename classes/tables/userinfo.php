<?php
defined("EXEC") or ("You do not have access to that file");
require LOGIC;


//storing the info of a user
class UserInfo extends Logic{
   public $user_id = null;
   public $username = null;
   public $password = null;
   public $role = null;
   
   public function __construct($userdata) {
       parent::__construct();
       
       if(is_object($userdata)){
           foreach ($userdata as $key=>$value){
           if($this->get($key)){
               $this->$key=$value;
           }
           else
               $this->$key=$value;
       }
       
       }
   }
}

?>
