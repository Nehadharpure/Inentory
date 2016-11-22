

<?php include("../connection.php")?>
<div class="form-group">
                                            <label >City</label>
                                          <select class="form-control" style="width:90%" name="city" id="city">
                                          <option value="">City</option>
                                           <?php $cat= Get_City($_POST['id']);
					 
			   while($Showcat= $cat->fetch()) { ?>
               
               
                <option value="<?php echo $Showcat['City_Id']; ?>"><?php echo $Showcat['City_Name']; ?></option>   <?php  } ?>  
                                          </select>
                                        </div>