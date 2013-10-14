<?php

defined("EXEC") or ("You do not have access to that file");

//storing an attr of a user
class UserToAttrInfo extends Logic {

    public $user_id = null;
    public $attr_id = null;

    public function __construct($data) {
        parent::__construct();

        if (is_object($data)) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

}

?>
