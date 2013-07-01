<?php
defined("EXEC") or ("You do not have access to that file");

class Database {
    private $Database = null;
    private $Host=null;
    private $Username = null;
    private $Password = null;
    
  // Tester Properties
  private $isConnected = false;
  
  protected $DBResource=null; //once we retrieve the database, it is gonna be saved here
  
  private $databaseOpen=false;
  
  public function __construct($database = false) {
      
  }
  
  public function Connect($host,$username,$password, $database=false){
     
      $this->DBResource = mysqli_connect($host,$username,$password,$database);
     if ($this->DBResource)
  {
         if (mysqli_connect_errno($this->DBResource))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  return false;
  }
   $this->isConnected=true;
  return true;
  }

   return false;  
//      if ($this->DBResource){
//         
//          
//          if($database){
//              $this->SelectDB($database);
//          }
//          $this->isConnected=true;
//          return true;
//      }
//      return false;
  }
  
  public function SelectDB($database){
      
      if (!$this->Database){
          $this->Database=$database;
          echo "hi";
          $this->databaseOpen=true;
          return true;
      }
          return false;
  }
    
  
}

?>
