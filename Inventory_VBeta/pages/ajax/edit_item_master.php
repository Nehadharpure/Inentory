
<?php include("../connection.php");
//echo $_POST['id'];
?>
 <?php $showdetail = ItemUpdate_details($_POST['id']);
  $showdetails= $showdetail->fetch(); 
  
 $getlngth=getlength($showdetails['Item_Category_Id']);
$clength =  $getlngth->fetch();
$length=$clength['length'];
//echo $length;
$displayitemid = GetMaxItemIdplus($showdetails['Item_Category_Id'],$length,$showdetails['Item_Id']);
$itemid =  $displayitemid->fetch();
 
   

  ?>




<form role="form"  name="form1" id="form1"  action="ajax/Update_ItemMaster.php" method="post">
  
						<div class="col-lg-6">
                         <div class="form-group">
                                  <label>Item Category Id</label>
                                 
                             <input class="form-control" name="category_id"  readonly id="category_id" placeholder=" " value="<?php echo $showdetails['Item_Category_Id'];?>">
                                           
                                        </div>
                           <input type="hidden" id="srno" name="srno"  value="<?php echo $showdetails['Sr_No']; ?>" />
                                        <div class="form-group">
                                            <label>Material Id <span style="color:#F00">*</span></label>
                                            <div id="dis_itemid">
        <input class="form-control" type="text" id="trycatid" name="trycatid" value="<?php echo $showdetails['Item_Category_Id'];?>" style="width:10%" readonly="readonly" />
               <input class="form-control" style="width:60%;margin-top: -34px;margin-left: 57px;" name="item_id"  autofocus="autofocus" tabindex="0" id="item_id" placeholder=" " onchange="check_existid()" onblur="pointed();msg(this.value)"  value="<?php echo $itemid['Max_Item_Id'];?>" >
              
                                           </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Unit of measure(U.O.M.)<span style="color:#F00">*</span></label>
                               <input class="form-control" name="unit_measure" id="unit_measure"  value="<?php echo $showdetails['Unit_Of_Measure'];?>" placeholder="Enter Unit Of Measure " style="text-transform:uppercase;" tabindex="2"  onblur="msg2(this.value)" onblur="msg2(this.value)"  >
                                          
                                        </div>
                                        
                                       <button type="submit" name="update" id="update" tabindex="4" class="btn btn-success">Update</button>
                                        <button type="reset" class="btn btn-primary" tabindex="5">Reset</button>
                                         <button type="" class="btn btn-primary" name="back" tabindex="10" id="back" onClick="window.location.reload();">Back</button>
                                          
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                
                              
                               
                                    <div class="form-group">
                                    <div id="dis_catnew">
                                  <label>Item Category Name</label>
                                  
                                              <select class="form-control" name="category_nm"  tabindex="-1" id="category_nm"  style="color:#000;"  readonly>  <?php $getcategory = Getcategory();
											  while($showcategory = $getcategory->fetch()){
										 if($showdetails['Item_Category_Id'] == $showcategory['Item_Category_Id']) 
										 {?>
									 <option selected="selected" value="<?php echo $showdetails['Item_Category_Id'];?>"><?php echo $showcategory['Item_Category_Name'];?></option>
                                              <?php }}?>
                                            </select>
                                            </div>
                                            
                                      
                                            </div>
                                             
                                       
    
                                            <div class="form-group">
                                            <label>Material Name<span style="color:#F00">*</span></label>
                                           <input class="form-control" name="item_nm" id="item_nm"  value="<?php echo $showdetails['Item_Name'];?>" placeholder="Enter Item Name " tabindex="1"   onblur="msg1(this.value)">
                                        </div>
                                         <div class="form-group">
                                            <label>Reorder Level<span style="color:#F00">*</span></label>
                                           <input class="form-control" name="reorder" id="reorder"  value="<?php echo $showdetails['Reorder_level'];?>" placeholder="Enter Reorder Level" tabindex="3"  onblur="msg3(this.value)">
                                        </div>
                                        
                                                                           </div>
                                <!-- /.col-lg-6 (nested) -->
                                </form>
                                
                                <script>
    $(document).ready(function() {
       $('#item_id').focus();
    });
	
	
    </script>
                                 <script>
  $(document).ready(function(){
    $("#form1").validate({
		  ignore: ":hidden",
  rules: {
	
	  
	  category_nm: {required: true},
	  item_nm: {required:true},
	  unit_measure: {required:true},
	  reorder: {required:true},
	 item_id: {required:true},
	 
    },
  messages: {
	 // Geog_Id: {required: 'Select Geog ID'},
	  category_nm: {required: 'Please Select Category'},
	  item_nm: {required: 'Please Enter Item Name'},
	  unit_measure: {required: 'Please Enter Unit Of Measure'},
	  reorder: {required: 'Please Enter Reorder Level'},
	  item_id: {required: 'Please Enter Item Id'},
  }
});
  });
  </script>
  
  <script>

$("#unit_measure").on("keypress", function(event) {
 var englishAlphabetAndWhiteSpace = /[A-Za-z ]/g;
   var key = String.fromCharCode(event.which);
    
    //alert(event.keyCode);
    if (event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || englishAlphabetAndWhiteSpace.test(key)) {
        return true;
    }
    return false;
});

$('#unit_measure').on("paste",function(e)
{
    e.preventDefault();
});
</script>

<script>
   $('#reorder').keypress(function (e) {
         if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                     $('#qty').html(" Please Enter Digits Only").show();
                          return false;
        }
        else if(($('#qty').val())=='' && e.which == 48)
       {
            
            return false;
       }
        
       }); 
	   
	  
  </script>
<script>
   $('#item_id').keypress(function (e) {
         if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                     $('#qty').html(" Please Enter Digits Only").show();
                          return false;
        }
        else if(($('#qty').val())=='' && e.which == 48)
       {
            
            return false;
       }
        
       }); 
	   
	  
  </script>



<script>

$("#item_nm").on("keypress", function(event) {
 var englishAlphabetAndWhiteSpace = /[A-Za-z ]/g;
   var key = String.fromCharCode(event.which);
    
    //alert(event.keyCode);
    if (event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || englishAlphabetAndWhiteSpace.test(key)) {
        return true;
    }
    return false;
});

$('#item_nm').on("paste",function(e)
{
    e.preventDefault();
});
</script>

 