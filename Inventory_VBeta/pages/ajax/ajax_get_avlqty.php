<?php  
include("../connection.php");
$displayavlqty = getStockIn_Itemnm($_POST['selectItemId']);
$avlqty =  $displayavlqty->fetch();
//print_r($avlqty);

 ?>


<div id="dis_avlqty">
  <input class="form-control" name="avlqty"  disabled="disabled" id="avlqty" value="<?php echo $avlqty['Available_Qty']?>">
 </div> 
