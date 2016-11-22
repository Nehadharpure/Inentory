<?php  
include("../connection.php");
$displayItemNm=getStockIn_Itemnm($_POST['selectItemId']);
$Itemnm =  $displayItemNm->fetch(); ?>



<div id="dis_avlqty">
   <input class="form-control" name="avlqty"   disabled="disabled" id="avlqty" value="<?php echo $Itemnm['Available_Qty']?>">
 </div>