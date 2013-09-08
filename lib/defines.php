<?php
define("EXEC","true");
define("DS", DIRECTORY_SEPARATOR); //suitable slash for windows and linux
define("ROOT",$_SERVER['DOCUMENT_ROOT'].DS. "IDEP".DS);
define("LIB_ROOT",ROOT.'lib'.DS);
define("LOGIC", LIB_ROOT.'logic'. DS .'logic.php');
define ("MODELS",ROOT.'classes'.DS.'models'.DS);
define ("VIEWS",ROOT.'views'.DS);
define ("BOOTSTRAP", LIB_ROOT.'bootres'.DS.'bootmain.php');
define ("TABS",LIB_ROOT.'bootres'.DS.'tabs.php');
define ("CONS",ROOT.'classes'.DS.'controllers'.DS);
define ("TABLES",ROOT.'classes'.DS.'tables'.DS);
?>
