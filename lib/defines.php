<?php
define("EXEC","true");
define("DS", DIRECTORY_SEPARATOR); //suitable slash for windows and linux
define("ROOT",$_SERVER['DOCUMENT_ROOT'].DS. "IDEP".DS);
define("LIB_ROOT",ROOT.'lib'.DS);
define("LOGIC", LIB_ROOT.'logic'. DS .'logic.php');
define ("MODELS",ROOT.'classes'.DS.'models'.DS);
?>
