<?php include("../connection.php");
 $showid = getSupplier_Id($_POST['supplier_id']);
  $check = $showid->rowCount(); 

  $var = 5;
  if($check!=0)
   {  
      echo $var;
   }
 ?>
