<?php  
include("../connection.php");
$displayavlqty = getAvlQtyOfIssueByGeog($_POST['selectItemId'],$_POST['selectIssueby']);
$avlqty =  $displayavlqty->fetch();
$avlzero = 0;
//print_r($avlqty);
if($avlqty['Availabe_Qty']!='')
{
 ?>


<div id="dis_avlqty">
  <input class="form-control" name="avlqty"  disabled="disabled" id="avlqty" value="<?php echo $avlqty['Availabe_Qty']?>">
 </div> 
<?php }else {?>
<div id="dis_avlqty">
  <input class="form-control" name="avlqty"  disabled="disabled" id="avlqty" value="">
 </div>
 <?php } ?>