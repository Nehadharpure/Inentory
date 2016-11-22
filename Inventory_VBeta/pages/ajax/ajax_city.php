<?php
 include('../connection.php');
 $stateId = $_POST['stateId'];
 ?>

<label>City</label>
									<select class="form-control" name="city" id="city" tabindex="5" >
										<option value="">Select City</option>
									<?php $city = getCity($stateId); 
											     while($cityName = $city->fetch()){
													 //print_r(stateName);	
										 ?>
                                        <option  value="<?php echo $cityName['City_Id']; ?>">
                                        <?php echo $cityName['City_Name']; ?>
                                        </option>
                                        <?php } ?> 
									</select>