
<?php  
include("../connection.php");
$displayItemNm=getStockIn_Itemnm($_POST['selectItemId']);
$Itemnm =  $displayItemNm->fetch(); 
//print_r($Item_nm);
?>


<div id="dis_itemnm">
<input class="form-control" name="item_nm"  disabled="disabled" id="item_nm" value="<?php echo $Itemnm['Item_Id']?>">
 </div> 
