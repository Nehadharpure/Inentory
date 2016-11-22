<?php include('../connection.php');

  
  $showid = getLocation_Id($_POST['location_id']);
  $check = $showid->rowCount(); 
 
  if($check!=0 )
  { 
     echo "<script>alert('Location Id is Already Exist');</script>";
     echo "<script>window.location= '../location_master.php';</script>";
  }
 
 else
 {
InsertLocationMaster($_POST['location_id'],$_POST['location_nm'],$_POST['address'],$_POST['country'],$_POST['state'],$_POST['city'],$_POST['contact_no'],$_POST['pcontact_no']);
 echo "<script>window.location= '../location_master.php';</script>";
	
 }
?>