<?php
include("../connection.php");
$existCategory = GetExistitemname($_POST['itemname']);
$check=$existCategory->rowCount(); 
 if($check!=0 )
  { 
     $abc=5;
	 echo $abc;
  }
 
?>