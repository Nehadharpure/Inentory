<?php include("../connection.php"); ?>
                                    
                                    <label>Category Name<span style="color:#F00">*</span></label>
                                              <select class="form-control"  name="category_nm" id="category_nm" onChange="dis_categoryId(this.value)" style="width:65%;color:#000;"  autofocus tabindex="0">
                                              
                                              <?php $getcategory = Getcategorytry();
											  while($showcategory = $getcategory->fetch()){
												//  print_r($showcategory);?>
                                              
                                                <option value="<?php echo $showcategory['Item_Category_Id'];?>"><?php echo $showcategory['Item_Category_Name'];?></option> 
												<?php }?>
                                            </select>
                                            
                                         