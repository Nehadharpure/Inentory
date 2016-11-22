<?php include("../connection.php")?>
<div class="form-group">
                                            <label >State</label>
                                           <select class="form-control" style="width:90%" name="state" id="state" onchange="get_city(this.value)">
                                           <option value="">Select State</option>
                                           <?php $cat= Get_State($_POST['id']);
					 
			   while($Showcat= $cat->fetch()) { ?>
                                            <option value="<?php echo $Showcat['State_Id']; ?>"><?php echo $Showcat['State_Name']; ?></option>   <?php  } ?>  
                                           </select>
                                        </div>