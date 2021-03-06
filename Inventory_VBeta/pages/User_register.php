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
    <!-- <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->

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
                    
                        <i class="fa fa-user fa-fw white"></i>  <i class="fa fa-caret-down white"></i>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw "></i> User Registration</a>
                        </li>
                         <li><a href="change_password.php"><i class="fa fa-gear fa-fw"></i> Change Password</a></li>
                       
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
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
                                    <a href="material_transfer.php">Material Inter-Transfer</a>
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
					&nbsp;&nbsp;&nbsp;&nbsp;User Register
				</div>
				<div class="panel-body">
					<div class="row" id="dispalyupdate">
                   
                      <form role="form" name="form1" id="form1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						<div class="col-lg-6">
                          
                               <div class="form-group">
                                  <label>Location ID <span style="color:#F00">*</span></label>
                                  <select class="form-control" name="store_id" id="store_id" style="color:#000;"  autofocus tabindex="0" onBlur="pointer()">
                             <option value="">Select Store Id</option>
												<?php $getGeogId = getGeogId();
												 while($showGeogId= $getGeogId->fetch()) {
												?>
									<option value="<?php echo $showGeogId['Geog_Id'];?> "><?php echo $showGeogId['Geog_Id'];?></option>
									<?php } ?>  
                                    </select>    
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                             <input class="form-control" value="" name="name" id="name"  tabindex="2" placeholder="Enter Name ">
                                        </div>
                                        <div class="form-group">
                                            <label>Password  <span style="color:#F00">*</span></label>
                                            <input class="form-control"  type="password" name="password"  tabindex="4" id="password"  autocomplete="off" placeholder="Enter Password " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).{8,}" title="Must contain minimum one number and one uppercase and lowercase letter, 1 special character like (@,#,$,%,&) and minimum 8 or more characters">
                                           
                                        </div>
                                  
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                            <div class="form-group">
                                                <label>User Type <span style="color:#F00">*</span></label>
                                                <select class="form-control" name="user_type" id="user_type"  tabindex="1" style="color:#000;" >
												<option value="">Select User Type</option>
												<?php $getusertype = getusertype();
												 while($showusertype= $getusertype->fetch()) {
												?>
									<option value="<?php echo $showusertype['User_ID'];?> "><?php echo $showusertype['Users_Type'];?></option>
									<?php } ?>
									</select>
                                             
                                            </div>
                                            <div class="form-group">
									<label>User Name  <span style="color:#F00">*</span></label>
									  <input class="form-control" name="username" id="username"  tabindex="3" maxlength="20" placeholder="Enter UserName">
								</div>
                                
                               <div class="form-group" id="stated">
									<label>Confirm Password  <span style="color:#F00">*</span></label>
									<input class="form-control" type="password" name="cpassword" id="cpassword"  tabindex="5" placeholder="Enter Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).{8,}" title="Must contain minimum one number and one uppercase and lowercase letter, 1 special character like (@,#,$,%,&) and minimum 8 or more characters">
								</div>
                                
                               
                                
                                  <button type="submit" class="btn btn-success" name="submit" id="submit" tabindex="6">Submit</button>
                                        <button type="reset" class="btn btn-primary" name="reset" id="reset" tabindex="7">Reset</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                 </form>
                                 
                            </div>
                            <!-- /.row (nested) -->
                            <!--table-->
                            
                            <!--end of table-->
                            
                          
                        </div>
                        <!-- /.panel-body -->
                        <div class="modal fade" id="deleterow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                
                                   Are You Sure ,You want to delete user?
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
                                            <th>Store ID</th>
                                             <th>User Type</th>
                                            <!-- <th>User ID</th>-->
                                             <th>User Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                   
                                      <?php
									   $getUser_details = getUser_details();
									  $i=1;
									   while($showtUser_details = $getUser_details->fetch()){
												 ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $showtUser_details['Geog_Id'];?> </td>
                                             <td><?php echo $showtUser_details['Users_Type'];?></td>
                                           <!-- <td><?php echo $showtUser_details['Rec_id'];?> </td>-->
                                            <td><?php echo $showtUser_details['username'];?></td>
                                            
                                            <td>
                                            <center><a href="#"  onClick="get_update('<?php echo $showtUser_details['Rec_id'];?>')"><span id="edit1" name="edit1" class="fa fa-edit" title="Edit"   style="font-size:24px;"></span></a><a href="#"  data-toggle="modal" data-target="#deleterow" onClick="del_msg('<?php echo $showtUser_details['Rec_id'];?>');"><span class="fa fa-times-circle" style="font-size:24px;" title="Delete"></span></a></center></td>
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
	
    </script>
    
  <script>
  function get_update(id)
  {
	 
	  $.ajax({ 
						type: "POST",
						url: 'ajax/edit_User_Register.php',
						data: {'id':id},
						success: function(data){
							//alert(data);
							$('#dispalyupdate').html(data);
						
					},
		});
		  
	  
  }
  
   function del_msg(id)
   {
	  // alert(id);
	 
	  $('#dis_id').val(id);
	  $('#dis_id1').html(id);
   }
   
   
   function delete_partItem(id)
   {
	  
	   
	   $.ajax({ 
						type: "POST",
						url: 'ajax/delete_User.php',
						data: {'id':id},
						success: function(data){
							//alert(data);
							$('#dis_table').html(data);
							window.location.reload();
						
					},
		});
		 
	   
   } 
	function pointer()
	{
	$('#user_type').focus();	
		
	}

  </script>
  <script>

$("#name").on("keypress", function(event) {
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
	 
	
  }
});
  });
  </script>
  
  
  <?php
	if (isset($_POST['submit']))
	{
             // session_start(); 
 
             print_r($_POST);
         // echo $_POST['store_id'];

  
  
  $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  
    $localtime = date('H:i:s');
   $localdate = date('Y-m-d');   

	  
	 Insert_company_profile($localdate,$localtime,$_POST['store_id'],$_POST['user_type'],$_POST['name'],$_POST['username'],$_POST['password']);
  
           echo "<script>window.location= 'User_register.php';</script>";  

	  
	}
  ?>
 

   <?php
	if (isset($_POST['update']))
	{
    // session_start(); 
 
 //print_r($_POST);
   
  
  $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  
  $localtime = date('H:i:s');
   $localdate = date('Y-m-d');       
	  
	 Update_company_profile($localdate,$localtime,$_POST['store_id'],$_POST['user_type'],$_POST['name'],$_POST['username'],$_POST['password'],$_POST['rec_id']);
  
   
	  echo "<script>window.location= 'User_register.php';</script>";  
	}
  ?>
 

</body>

</html>
