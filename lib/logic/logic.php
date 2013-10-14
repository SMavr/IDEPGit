
<?php
defined("EXEC") or ("You do not have access to that file");
require_once LIB_ROOT.'database'.DS.'mysql.php';
require_once LIB_ROOT.'config.php';
// class for objects that have properties
class Logic {
    public $db=null;
    
    public function __construct() {
        $config=new Config();
        $this->db = new MySqlAdaptor();
        // here happens the connection
         $this->db->Connect($config->Host,$config->Username,$config->Password,$config->Database);
        
    }
    
    public function get($property,$object = false){
        if (property_exists($this, $property)){
                return $this->$property;}
       if($object){
           if(property_exists($object, $property)){
               return $object->$property;
           }
              if  (property_exists($this, $object)) {
                  
                  if (property_exists($this->$object, $property)){
                      return $this->$object->$property;
                  }
              }  
       }
       return false;
    }
}

?>
