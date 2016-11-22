<?php 
  include('../connection.php');
 
  $showid = getSupplier_Id($_POST['supplier_id']);
  $check = $showid->rowCount(); 
 
  if($check!=0 )
  { 
     echo "<script>alert('Supplier Id is Already Exist');</script>";
     echo "<script>window.location= '../supplier_master.php';</script>";
  }
  else
  {
InsertsupplierMaster($_POST['supplier_id'],$_POST['supplier_nm'],$_POST['address'],$_POST['country'],$_POST['state'],$_POST['city'],$_POST['email'],$_POST['contact_no'],$_POST['pcontact_no']);
 echo "<script>window.location= '../supplier_master.php';</script>";
 
  }
?>
  
  