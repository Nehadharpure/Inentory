
<?php include("../connection.php");
//echo $_POST['id'];
?>
 <?php $showdetail = supplierUpdate_details($_POST['id']);
  $showdetails= $showdetail->fetch(); 
  //print_r($showdetails);
 
  ?>

<form role="form" name="form1" id="form1" action="ajax/Update_supplier.php" method="post">
						<div class="col-lg-6">
                          
                               <div class="form-group">
                                  <label>Supplier Id <span style="color:#F00">*</span></label>
                            <input class="form-control"  name="supplier_id" id="supplier_id"  readonly value="<?php echo $showdetails['Supplier_Id']; ?>">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Address </label>
                                            <textarea class="form-control" name="address" id="adddress" rows="3" tabindex="2" placeholder="Enter Address " ><?php echo $showdetails['Address']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Email ID </label>
                                            <input class="form-control" name="email" id="email"  tabindex="6" placeholder="xyz@gmail.com" value="<?php echo $showdetails['Email']; ?>"/>
                                           
                                        </div>
                                          <div class="form-group">
                                            <label>Contact Person</label>
                                            <input class="form-control" name="pcontact_no" id="pcontact_no"  tabindex="7" placeholder="Enter Contact Person "  value="<?php echo $showdetails['Contact_Person']; ?>" />
                                           
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" name="contact_no" id="contact_no"  tabindex="8" placeholder="Enter Supplier Contact Number" maxlength="10"  value="<?php echo $showdetails['Contact_No']; ?>" />
                                           
                                        </div>
                                        
                                        
                                      
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                            <div class="form-group">
                                                <label>Supplier Name <span style="color:#F00">*</span></label>
                                              <input class="form-control" name="supplier_nm" id="supplier_nm"  tabindex="1"placeholder="Enter Supplier Name" value="<?php echo $showdetails['Supplier']; ?>" >
                                            </div>
                                             <div class="form-group">
									<label>Country</label>
									<select class="form-control" name="country" id="country" onChange="getstatedetails(this.value);"  tabindex="3">
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
									<select class="form-control" name="city" id="city"  tabindex="5">
									  <?php $GetCity = getPerticularCity($showdetails['City_Id']);
											$CityName = $GetCity->fetch();
									 ?>
										<option value="<?php echo $showdetails['City_Id']; ?>"> <?php echo $CityName['City_Name']; ?></option>
									</select>
								</div>	 
                   <button type="submit" class="btn btn-success" name="update"  tabindex="9" id="update">Update</button>
                        <button type="button" onClick="get_update('<?php echo $showdetails['Supplier_Id'];?>')" class="btn btn-primary" name="reset" id="reset" tabindex="10">Reset</button>
                         <button type="" class="btn btn-primary" name="back" tabindex="10" id="back" onClick="window.location.reload();">Back</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                 </form>
                                 
                                 
                                        <script>
  $(document).ready(function(){
    $("#form1").validate({
		  ignore: ":hidden",
  rules: {
	
	  supplier_id: {required: true},
	  supplier_nm: {required: true},
	 
	 // address: {required: true},
	 // email: {required: true},
	 // contact_no: {required: true},
	 // country: {required: true},
	  //state: {required: true},
	  //city: {required: true},
	   
	   
    },
  messages: {
	 // Geog_Id: {required: 'Select Geog ID'},
	
	  supplier_id: {required: 'Please Enter Supplier Id'},
	  supplier_nm: {required: 'Please Enter Supplier Name'},
	 
	 // address: {required: 'Please Enter the Address'},
	 // email: {required: 'Please Enter the Email ID'},
	 // contact_no: {required: 'Please Enter the Contact No'},
	 // country: {required: 'Please Select Country'},
	 // state: {required: 'Please Select State'},
	 // city: {required: 'Please Select City'},
	 
	
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
  