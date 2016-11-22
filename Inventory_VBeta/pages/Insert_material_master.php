<?php include('connection.php');
$itemidss=$_POST['item_id'];
$unit_measure = strtoupper($_POST['unit_measure']);
$combination=$_POST['trycatid'].$itemidss;
$def = preg_replace('/\s+/', '', $combination);
InsertMaterialMaster($_POST['category_nm'],$def,$_POST['item_nm'],$unit_measure,$_POST['reorder']);
 echo "<script>window.location= 'material_master.php';</script>";
 
 
?>