<?php   
include('../connection.php');
$getUser_Update_Details = getUser_Update_Details($_POST['id']);
$showdetails = $getUser_Update_Details->fetch();
$getGeogId = getGeogId();
$abc=$showdetails['Geog_Id'];

?>

<form role="form" name="form1" id="form1" action="" method="post">
						<div class="col-lg-6">
                          <input type="hidden" name="rec_id" id="rec_id" value="<?php echo $_POST['id'];?>"/>
                               <div class="form-group">
                                  <label>Store Id <span style="color:#F00">*</span></label>
                                  <select class="form-control" name="store_id" id="store_id" autofocus="autofocus" tabindex="0">
                           <option value="">Select Store Id </option>
                          
                           
	<option  selected="selected" value="<?php echo $showdetails['Geog_Id'];?> "><?php echo $showdetails['Geog_Id'];?></option>      
                         	  <?php  $getGeogId = getGeogIdtry($showdetails['Geog_Id']);
								 while($showGeogId = $getGeogId->fetch()) { ?>
									
                                            
                   <option value="<?php echo $showGeogId['Geog_Id'];?> "><?php echo $showGeogId['Geog_Id'];?></option>
									<?php  }?>  
                                   
                                    </select>    
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                             <input class="form-control" value="<?php echo $showdetails['Name'];?>" name="name" id="name"  placeholder="Enter Name " tabindex="2">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control"  type="password" name="password"  tabindex="4" id="password"  autocomplete="off" placeholder="Enter Password " value="<?php echo $showdetails['password'];?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).{8,}" title="Must contain minimum one number and one uppercase and lowercase letter, 1 special character like (@,#,$,%,&) and minimum 8 or more characters">
                                           
                                        </div>
                                       
                                   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                            <div class="form-group">
                                                <label>User Type <span style="color:#F00">*</span></label>
                                                <select class="form-control" name="user_type" id="user_type"  tabindex="1">
												<option value="">Select User Type</option>
												<?php $getusertype = getusertype();
												 while($showusertype= $getusertype->fetch()) {
													 if($showdetails['User_ID'] == $showusertype['User_ID']){
												?>
          <option selected="selected" value="<?php echo $showusertype['User_ID'];?> "><?php echo $showusertype['Users_Type'];?></option>
                                                <?php } else { ?>
									<option value="<?php echo $showusertype['User_ID'];?> "><?php echo $showusertype['Users_Type'];?></option>
									<?php }} ?>
									</select>
                                             
                                            </div>
                                            <div class="form-group">
									<label>User Name</label>
									  <input class="form-control" name="username" id="username"  value="<?php echo $showdetails['username'];?>" placeholder="Enter UserName" tabindex="3">
								</div>
                                
                               <div class="form-group" id="stated">
									<label>Confirm Password</label>
									<input class="form-control" type="password" name="cpassword" id="cpassword"  tabindex="5" value="<?php echo $showdetails['passwordw'];?>" placeholder="Enter Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).{8,}" title="Must contain minimum one number and one uppercase and lowercase letter, 1 special character like (@,#,$,%,&) and minimum 8 or more characters">
								</div>
                                
                                <button type="submit" class="btn btn-success" name="update" id="update" tabindex="6">Update</button>
                                  <button type="reset" class="btn btn-primary" name="reset" id="reset" tabindex="7">Reset</button>
                                   <button type="" class="btn btn-primary" name="back" tabindex="10" id="back" onClick="window.location.reload();">Back</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                 </form>
        
        
        
        <script>
    $(document).ready(function() {
       $('#store_id').focus();
    });
	
    </script>                         
                                 
  <script>
  $(document).ready(function(){
    $("#form1").validate({
		  ignore: ":hidden",
  rules: {
	
	  store_id: {required: true},
	  user_type: {required: true},
	 
	  username: {required: true},
	  password: {required: true},
	  cpassword: {required: true, equalTo: "#password"},
	  username: {required: true},
	   
    },
  messages: {
	 // Geog_Id: {required: 'Select Geog ID'},
	
	  store_id: {required: 'Please Select the Store ID'},
	  user_type: {required: 'Please Select the User Type'},
	 
	  username: {required: 'Please Enter the User Name'},
	  password: {required: 'Please Enter the Password'},
	    cpassword: {required: 'Please Confirm the Password' ,equalTo: 'Password does not match'},
	  username: {required: 'Please Enter the  Confirm Password'},
	
  }
});
  });
  </script>
  