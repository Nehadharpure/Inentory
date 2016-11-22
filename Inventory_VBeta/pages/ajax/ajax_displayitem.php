<?php  
include("../connection.php");
$loc_id = $_POST['issueby'];

?>

<div id="item_of_interdept" >
										<select  class="form-control select2_single"  name="item_id" id="item_id" style="color:#000;" tabindex="2" onChange="getItemName(this.value);checkids(this.value);"> 
                                            <option value="">Select Material </option>
										 <?php $getItemId = AvlItem_interdept($loc_id);
				                              while($showItemId = $getItemId->fetch()){
							                ?>
                                            
                             <option value="<?php echo $showItemId['Item_Id']; ?>"><?php echo $showItemId['Item_Name']; ?></option>
                                          <?php } ?>                     
                                            </select>
                                             </div>

 <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select Material",
         allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->