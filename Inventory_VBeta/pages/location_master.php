
<?php
    session_start(); 
	include("connection.php"); 
	
    if($_SESSION['username'] != ''){
	$uid12 = $_SESSION['username'];
	$userid = $_SESSION['User_Id'];
	
	$Geog_Id = $_SESSION['Geog_Id'];


}
else
{
	echo "<script>window.location='login.php';</script>";
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Management</title>
     
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<!--   <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.error{
   color:#F00;	
}

.white{
	
color:#FFF;	
}
</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;  background-color:#23527c;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  style="color:#FFF;" href="#">Inventory Management</a>
                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    
                    <ul class="dropdown-menu dropdown-messages">
                        
                        <li class="divider"></li>
                        
                        <li class="divider"></li>
                        
                        <li class="divider"></li>
                        
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    
                    
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                 <span style="color:#fff"><?php echo $uid12; ?></span>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color:rgb(35, 82, 124)">
                    
                        <i class="fa fa-user fa-fw white" ></i>  <i class="fa fa-caret-down white"></i>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="User_register.php"><i class="fa fa-user fa-fw"></i> User Registration</a>
                        </li>
                       <li><a href="change_password.php"><i class="fa fa-gear fa-fw"></i> Change Password</a></li>
                       
                        <li class="divider"></li>
                        <li> <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li> 
                       
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="position:fixed">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                     <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Master Form<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="location_master.php">Location Master</a>
                                </li>
                                <li>
                                    <a href="material_master.php">Material Master</a>
                                </li>
								 <li>
                                    <a href="supplier_master.php">Supplier Master</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                       
                        <li>
                          <a href="#"><i class="fa fa-edit fa-fw"></i> Transaction<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="stockIn_transaction.php">Material Received</a>
                                </li>
                                <li>
                                    <a href="stockOut_transaction.php">Material Issued</a>
                                </li>
                                <li>
                                    <a href="material_transfer.php">Material Inter-Transfer </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Stock_In_Report.php">Material Received</a>
                                </li>
                                <li>
                                    <a href="Stock_Out_Report.php">Material Issued</a>
                                </li>
								 <li>
                                    <a href="Stock_Available.php">Stock In-Hand</a>
                                </li>
                                <li>
                                    <a href="Reorder_Details_Report.php">Reorder Details</a>
                                </li>
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

<div id="page-wrapper">
  <div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					 <a href="index.php"><span style="color:#23527c" class="glyphicon glyphicon-home"></span></a>
					&nbsp;&nbsp;&nbsp;&nbsp;Location Master
                    
				</div>
				<div class="panel-body">
					<div class="row" id="dispalyupdate">
                    
                      <form role="form" name="form1" id="form1" action="ajax/Insert_location_master.php" method="post">
						<div class="col-lg-6">
                          
                               <div class="form-group">
                                  <label>Location Id<span style="color:#F00">*</span></label>
                                            <input class="form-control" name="location_id" id="location_id"  onChange="checklocation_Id()" placeholder="Enter Location ID " autocomplete="off" autofocus tabindex="0">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" id="adddress"  tabindex="2" rows="3" placeholder="Enter Address " value=""  autocomplete="off"  ></textarea>
                                        </div>
                                        
                                       <div class="form-group">
                                            <label> Contact Person</label>
                                            <input class="form-control" name="pcontact_no" id="pcontact_no"  placeholder="Enter Contact Person"  autocomplete="off" tabindex="7">
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" name="contact_no" id="contact_no"  min="10" maxlength="10" placeholder="Enter Contact Number"  autocomplete="off" tabindex="8">
                                           
                                        </div>
                                         
                                      
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                            <div class="form-group">
                                                <label>Location Name<span style="color:#F00">*</span></label>
                                              <input class="form-control" name="location_nm" id="location_nm" placeholder="Enter Location Name"  autocomplete="off" tabindex="1">
                                            </div>
											
                                         <div class="form-group">
									<label>Country</label>
									<select class="form-control" name="country" id="country" onChange="getstatedetails(this.value);"  tabindex="3">
										<option value="">Select Country</option>
										<?php $country = getCountry(); 
											     while($countryName = $country->fetch()){	
										 ?>
                                        <option  value="<?php echo $countryName['Country_Id']; ?>">
                                        <?php echo $countryName['Country_Name']; ?>
                                        </option>
                                        <?php } ?> 
									</select>
								</div>
                                
                               <div class="form-group" id="stated">
									<label>State</label>
									<select class="form-control" name="state" id="state" onChange="" tabindex="5">
										<option value="">Select State</option>
									
									</select>
								</div>
                                
                                <div class="form-group" id="cityd">
									<label>City </label>
									<select class="form-control" name="city" id="city" tabindex="6" >
									<option value="">Select City</option>
									</select>
								</div>	   
									  <button type="submit" class="btn btn-success" name="submit" id="submit" tabindex="9">Submit</button>
                                        <button type="reset" class="btn btn-primary" name="reset" tabindex="10" id="reset">Reset</button>	
                                
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                 </form>
                                 
                            </div>
                            <!-- /.row (nested) -->
                            <!--table-->
                            
                            <!--end of table-->
                            
                          
                        </div>
                        <!-- /.panel-body -->
                        
        <!--Delete Row-->
        <div class="modal fade" id="deleterow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                
                                   Are You Sure ,You Want to delete Location ID <span id="dis_id1" style="color:#F00"></span> ?
                                      <input type="hidden" value="" name="dis_id" id="dis_id"/>
                                      </div>
                                     
                                        <div class="modal-footer">
                                          
        <button type="button" id="cdel" name="cdel" class="btn btn-primary" onClick="delete_partItem($('#dis_id').val());">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        
                                        </div>
                                    </div> <!-- /.modal-content -->
                                   
                                </div>  <!-- /.modal-dialog -->
                              
                            </div>
                        
						
                       <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
                                    <thead style="background-color:#23527c; color:#FFF;">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Location ID</th>
                                            <th>Location Name</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   
                                      <?php
									   $getgeog_details = getgeog_details();
									  $i=1;
									   while($showgeog_details = $getgeog_details->fetch()){
												 ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $showgeog_details['Geog_Id'];?> </td>
                                            <td><?php echo $showgeog_details['Location'];?></td>
                                            <td><?php echo $showgeog_details['Address'];?></td>
                                            <td><?php echo $showgeog_details['Contact_No'];?></td>
                                            <td>
                                            <center><a href="#" data-toggle="modal" data-target="#deleterow1" onClick="get_update('<?php echo $showgeog_details['Geog_Id'];?>')"><span id="edit1" name="edit1" class="fa fa-edit" title="Edit"   style="font-size:24px;"></span></a><a href="#"  data-toggle="modal" data-target="#deleterow" onClick="del_msg('<?php echo $showgeog_details['Geog_Id']?>');"><span class="fa fa-times-circle" style="font-size:24px;" title="Delete"></span></a></center></td>
                                           </tr>
                                       <?php $i++;} ?>
                                     </tbody>
                                </table>
                            </div>                            <!-- /.table-responsive -->
                            
                            
                          
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
   <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script> 
  <script type="text/javascript" src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script> 
    
     <script src="../js/jquery.validate.js"></script> 
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	$(document).ready(function(){
    $('#location_nm').click(function(){
      $(this).next('input,textarea').focus();
     
    });
});
    </script>
	

	
	<script>
	
	 function getstatedetails(countryId)
	 {
		 $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_state.php',
						data: {'countryId':countryId},
						success: function(data){
							$('#stated').html(data);
					},
		});		 
	 }
	 function getCitydetails(stateId)
	 
	 {
		  //alert(stateId);
		 $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_city.php',
						data: {'stateId':stateId},
						success: function(data){
							$('#cityd').html(data);
					},
		});		 
	 }
	
	</script>
    
    
    
<script type="text/javascript">
function checklocation_Id(){
    //alert("came");
var location_id=$("#location_id").val();// value in field 

$.ajax({
         type:'post',
        url:'ajax/checklocationId.php',// put your real file name 
        data:{location_id: location_id},
        success:function(data){
			
			if(data == 5)
			{
				alert("Location Id  Already Exist");
				$("#location_id").val('');
		        $("#location_id").focus();
			}
			else
			{
				//alert("otExist");
				$("#location_nm").focus();
			}
           // your message will come here.    
		// $("#location_id").val('');
		 // $("#location_id").focus();
        }
 });
}

</script>
	
	
	
	
    
    <script>
	
	
	function del_msg(loc_id)
   {
	  // alert(name);
	  var loc_id = loc_id;
	 // alert(loc_id);
	  $('#dis_id').val(loc_id);
	  $('#dis_id1').html(loc_id);
   }
   
   
   function delete_partItem(loc_id)
   {
	 // alert(loc_id);
	   
	   $.ajax({ 
						type: "POST",
						url: 'ajax/delete_LocationMaster.php',
						data: {'loc_id':loc_id},
						success: function(data){
							//alert(data);
							$('#dis_table').html(data);
							window.location.reload();
						
					},
		});
		 
	   
   } 
	
	
	
  </script>  
  <script>
  
  
  function get_update(id)
  {
	//alert('hi'); 
	//alert(id);
	//alert(val);
	
	$.ajax({ 
						type: "POST",
						url: 'ajax/ajax_editLocationMaster.php',
						data: {'id':id},
						success: function(data){
							//alert(data);
							$('#dispalyupdate').html(data);
							$(window).scrollTop(0);
						
					},
		});
		 
	  
  }
  
  
  </script>
  
   <script>
  $(document).ready(function(){
    $("#form1").validate({
		  ignore: ":hidden",
  rules: {
	
	  location_id: {required: true},
	  location_nm: {required: true},
	
    },
  messages: {
	 // Geog_Id: {required: 'Select Geog ID'},
	
	  location_id: {required: 'Please Enter Location Id'},
	  location_nm: {required: 'Please Enter Location Name'},
	
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
  
  
</body>

</html>
