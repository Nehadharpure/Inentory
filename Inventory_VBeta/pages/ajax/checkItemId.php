<?php include("../connection.php");
// echo $_POST['id'];
 $showid = getItem_Id($_POST['id']);
  $check = $showid->rowCount(); 
 // print_r($showid);
  $var = 5;
  if($check!=0)
   {  
      echo $var;
   }
   
 
 ?>