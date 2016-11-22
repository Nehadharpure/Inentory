<?php  
include("../connection.php");
$displayItemNm=getStockIn_Itemnm($_POST['selectItemId']);
$Itemnm =  $displayItemNm->fetch(); ?>



<div id="dis_unitmeasure">
   <input class="form-control" name="unit_measure"   disabled="disabled" id="unit_measure" value="<?php echo $Itemnm['Unit_Of_Measure']?>">
 </div>