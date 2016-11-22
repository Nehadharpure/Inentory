<?php  
include("../connection.php");

$getAvl_Interdep = AvtQty_Interdepartment($_POST['Inhouse_Id'],$_POST['selectItemId']);
  $showAvl_Interdep = $getAvl_Interdep->fetch();
  $avlqty_interdep = $showAvl_Interdep['Availabe_Qty'];
  

 ?>
  

<div id="dis_avlqty_interdep">
  <input class="form-control" name="avlqty_interdep"  disabled="disabled" id="avlqty_interdep" value="<?php echo $showAvl_Interdep['Availabe_Qty']?>">
 </div>
