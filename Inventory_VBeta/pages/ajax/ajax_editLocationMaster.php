<?php include("../connection.php");

 $showdetail = locationUpdate_details($_POST['id']);
  $showdetails= $showdetail->fetch(); 

  ?>
 <form role="form" name="form1" id="form1" action="ajax/Update_location.php" method="post">
						<div class="col-lg-6">
                          
                               <div class="form-group">
                                  <label>Location Id</label>
                              <input class="form-control" name="location_id" id="location_id" readonly="readonly"  placeholder="Enter Location ID" value="<?php echo $showdetails['Geog_Id']?>" >
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address"  id="adddress" rows="3" tabindex="2" placeholder="Enter Address "><?php echo $showdetails['Address']?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> Contact Person</label>
                                            
                                             <input class="form-control" name="pcontact_no" id="pcontact_no"  placeholder="Enter Contact Person " value="<?php echo $showdetails['Contact_Person']?>" tabindex="6" autocomplete="off">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" name="contact_no" id="contact_no" maxlength="10" value="<?php echo $showdetails['Contact_No']?>" placeholder="Enter Contact Number " tabindex="7" autocomplete="off">
                                           
                                        </div>
                                        
                                        
                                        
                                       
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                            <div class="form-group">
                                                <label>Location Name</label>
                                 <input class="form-control" name="location_nm" id="location_nm" value="<?php echo $showdetails['Location']?>" placeholder="Enter Location Name" tabindex="1">
                                            </div>
                                            
                                       <div class="form-group">
									<label>Country</label>
									<select class="form-control" name="country" id="country" onChange="getstatedetails(this.value);" tabindex="3" >
										<?php $country = getCountry(); 
											     while($countryName = $country->fetch()){	
												 if($showdetails['Country_Id'] == $countryName['Country_Id'] )
												 { ?>
                                                 <option  value="<?php echo $countryName['Country_Id']; ?>">
                                        <?php echo $countryName['Country_Name']; ?>
                                        </option>
												 <?php } else {?>
											 <option  value="">
                                       Select Country
                                        </option>	 
												
                                        <option  value="<?php echo $countryName['Country_Id']; ?>">
                                        <?php echo $countryName['Country_Name']; ?>
                                        </option>
                                        <?php }} ?> 
												
									</select>
								</div>
                                
                               <div class="form-group" id="stated">
									<label>State</label>
									<select class="form-control" name="state" id="state" onChange="getCitydetails(this.value);"  tabindex="4">
                                    <?php $GetState = getPerticularState($showdetails['State_Id']);
											$stateName = $GetState->fetch();
									 ?>
                                     
					<option value="<?php echo $showdetails['State_Id']; ?>"> <?php echo $stateName['State_Name']; ?></option>
                      <?php $state = getState($showdetails['Country_Id']); 
											     while($stateName = $state->fetch()){
													// print_r(stateName);	
										 ?>
                                        <option  value="<?php echo $stateName['State_Id']; ?>">
                                        <?php echo $stateName['State_Name']; ?>
                                        </option>
                                        <?php } ?> 
									
									</select>
								</div>
                                
                                <div class="form-group" id="cityd">
									<label>City</label>
									<select class="form-control" name="city" id="city" tabindex="5">
									  <?php $GetCity = getPerticularCity($showdetails['City_Id']);
											$CityName = $GetCity->fetch();
									 ?>
										<option value="<?php echo $showdetails['City_Id']; ?>"> <?php echo $CityName['City_Name']; ?></option>
									</select>
								</div>	 
                   <button type="submit" class="btn btn-success" name="Update" id="Update" tabindex="8">Update</button>
            <button type="button" class="btn btn-primary" name="reset" id="reset" onClick="get_update('<?php echo $showdetails['Geog_Id'];?>')" tabindex="9">Reset</button> 
             <button type="" class="btn btn-primary" name="back" tabindex="10" id="back" onClick="window.location.reload();">Back</button>      
                                  
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                 </form>
                                 
  
  
  <script>
  $(document).ready(function(){
    $("#form1").validate({
		  ignore: ":hidden",
  rules: {
	
	  location_id: {required: true},
	  location_nm: {required: true},
	 
	 // item_id: {required: true},
	  //item_nm: {required: true},
	 // qty: {required: true},
	 // price: {required: true},
	   
	   
    },
  messages: {
	 // Geog_Id: {required: 'Select Geog ID'},
	
	  location_id: {required: 'Please Enter Location Id'},
	  location_nm: {required: 'Please Enter Location Name'},
	 
	 // item_id: {required: 'Please Select Item Id'},
	 // qty: {required: 'Please Enter the Quantity'},
	//  price: {required: 'Please Enter the Price'},
	 
	
  }
});
  });
  </script>                               
                                 
<script>
  $('#contact_no').keypress(function (e) {
         if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                     $('#contact_no').html(" Please Enter Digits Only").show();
                          return false;
        }
        /*else if(($('#contact_no').val())=='' && e.which == 48)
       {
            
            return false;
       }*/
        
       });                  
  
 </script>                          
                                 
 <script>

$("#pcontact_no").on("keypress", function(event) {
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
  
                        
                   