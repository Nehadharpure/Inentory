<?php include("../connection.php");
//echo $_POST['supplier_nm'];
//echo $_POST['state'];
//echo $_POST['category_nm'];
//echo $_POST['item_id'];
//die();


$combination=$_POST['trycatid'].$_POST['item_id'];
updateItemMaster($_POST['category_nm'],$_POST['item_nm'],$_POST['unit_measure'],$_POST['reorder'],$combination,$_POST['srno']);
echo "<script>window.location= '../material_master.php';</script>";
?>
  