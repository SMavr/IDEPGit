<?php
defined("EXEC") or ("You do not have access to that file");
require_once LIB_ROOT.'database'.DS.'database.php';


class MySqlAdaptor extends Database {
    
private $Query=null;
private $Resource=null;
public  $Row=null;
public  $Rows=null;

    public function __construct($database = false) {
        parent::__construct($database);
    }
    public function  setQuery($query){
        $this->Query=$query;
        if ($query){
           
            $this->Resource= mysqli_query($this->DBResource,$query);
            if ($this->Resource){
                return true;
            }
        }
        return false;
    }
    
    //get a row
    public function getRow(){
      
        if($this->Resource){    
            $this->Row =  mysqli_fetch_object($this->Resource);
            if(is_object($this->Row)){
                return $this->Row;
            }
        }
        return false;
    }
    
    public function getRows(){
        $this->Rows=array(); //initialize Rows
        
        if ($this->Resource){
        while ($row = mysqli_fetch_object($this->Resource)) {
            $this->Rows[]=$row;
        }
        }
        return $this->Rows;
    }
    
    //get the number of rows in a table
    public function getNumRows(){
        if ($this->Resource){
            return mysqli_num_rows($this->Resource);
        }
    }
}

?>
