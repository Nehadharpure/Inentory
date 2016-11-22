<?php
 include('../connection.php');
 $countryId = $_POST['countryId'];
 
 ?>

<label>State</label>
									<select class="form-control" name="state" id="state" onChange="getCitydetails(this.value);" tabindex="4">
										<option value="">Select State</option>
									<?php $state = getState($countryId); 
											     while($stateName = $state->fetch()){
													// print_r(stateName);	
										 ?>
                                        <option  value="<?php echo $stateName['State_Id']; ?>">
                                        <?php echo $stateName['State_Name']; ?>
                                        </option>
                                        <?php } ?> 
									</select>