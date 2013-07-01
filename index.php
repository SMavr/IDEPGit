<?php
require_once 'lib/framework.php';
$logic = new UserModel();

echo "<pre>";
//print_r($logic->getUser(1));
print_r($logic->getUsers());
//print_r($logic);
//$logic->db->setQuery("select * from user");
//
//print_r($logic->db->getRows());
?>


