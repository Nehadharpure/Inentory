<?php include("../connection.php");
//echo $_POST['location_id'];
//echo $_POST['contact_no'];

 

updateLocationMaster($_POST['location_id'],$_POST['location_nm'],$_POST['address'],$_POST['country'],$_POST['state'],$_POST['city'],$_POST['contact_no'],$_POST['pcontact_no']);
echo "<script>window.location= '../location_master.php';</script>";


?>