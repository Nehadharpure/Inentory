<?php  
include("../connection.php");
$getlngth=getlength($_POST['cat_id']);
$clength =  $getlngth->fetch();
$length=$clength['length'];
//echo $length;
$displayitemid = GetMaxItemId($_POST['cat_id'],$length);
$itemid =  $displayitemid->fetch();



//print_r($avlqty);

 ?>

   <div id="dis_itemid">
   <input class="form-control" type="text" id="trycatid" name="trycatid" value="<?php echo $_POST['cat_id']; ?>" style="width:10%" readonly="readonly" />
     <input class="form-control" style="width:60%;margin-top: -34px;margin-left: 57px;"  autofocus="autofocus" tabindex="1"  name="item_id" id="item_id"  onblur="msg(this.value)" placeholder="Item Id" autocomplete="off"  onchange="check_existid()" value="<?php if($itemid['Max_Item_Id']!=''){echo $itemid['Max_Item_Id'];} else { echo '1';}?>">
     
     <span hidden="hidden" id="msg" style="color:red">Item Id Already Exists</span>
   </div>
   
   
   
   
<!--<script type="text/javascript">
function check_existid(){
  alert('ok');
var item_id=$("#item_id").val();// value in field 

alert('item_id');

$.ajax({
         type:'post',
        url:'ajax/checkItemId.php',// put your real file name 
        data:{item_id: item_id},
        success:function(data){
			alert(data);
			if(data == 5)
			{
				alert("Item Id  Already Exist");
				$("#item_id").val('');
		        $("#item_id").focus();
			}
			else
			{
				//alert("otExist");
				$("#item_nm").focus();
			}
           
        }
 });
}

</script>-->