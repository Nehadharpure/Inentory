<?php include("../connection.php");
//echo $_POST['supplier_nm'];
//echo $_POST['state'];
//cho $_POST['country'];

updateSupplierMaster($_POST['supplier_id'],$_POST['supplier_nm'],$_POST['address'],$_POST['country'],$_POST['state'],$_POST['city'],$_POST['email'],$_POST['contact_no'],$_POST['pcontact_no']);
echo "<script>window.location= '../supplier_master.php';</script>";
?>