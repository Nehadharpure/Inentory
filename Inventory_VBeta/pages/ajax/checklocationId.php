<?php include("../connection.php");
 $showid = getLocation_Id($_POST['location_id']);
  $check = $showid->rowCount(); 
 // print_r($showid);
  $var = 5;
  if($check!=0)
   {  
      echo $var;
   }
   
 ?>