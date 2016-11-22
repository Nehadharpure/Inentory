
<?php
    session_start(); 
	include("connection.php"); 
	
    if($_SESSION['username'] != ''){
	$uid12 = $_SESSION['username'];
	$userid = $_SESSION['Rec_id'];
	$pass = $_SESSION['password'];
	$uid =$_SESSION['User_Id'];
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
.white{
	
color:#FFF;	
}
.center{
	text-align:center;
	
}
.error{
	color:#F00;
	
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
                
                <a class="navbar-brand"  style="color:#FFF;" href="index.php">Inventory Management</a>
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
                <!--show Alert-->
                <li class="dropdown">
                   <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color:rgb(35, 82, 124)">
                    <i class="fa fa-bell fa-fw white"></i> -->
                    <!--Alert-->
                  <div style="color:#F00;background-color:#FFC; margin-top:-32px;  border-radius:12px; font-size:14px; text-align:center;" id="itemalert_cnt"></div> 
                  <!--End Alert-->
                    
                     <!-- <i class="fa fa-caret-down white"></i>-->
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="Reorder_Details_Report.php">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>See Item Alert
                                    <span class="pull-right text-muted small"></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                       
                        <!--<li>
                            <a class="text-center" href="Reorder_Details_Report.php">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>-->
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- End of Alert-->
				<span style="color:#fff"><?php echo $uid12 ; ?></span>
               
                <li class="dropdown">
                
				
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color:rgb(35, 82, 124)">
                     
                        <i class="fa fa-user fa-fw white"></i>  <i class="fa fa-caret-down white"></i>
                        
                    </a>
                   <ul class="dropdown-menu dropdown-user">
                        <li><a href="User_register.php"><i class="fa fa-user fa-fw"></i> User Registration</a>
                        </li>
                        <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>-->
                        <li class="divider"></li>
                        <li> <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li> 
                    
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        
        <div id="" style="margin-left:200px; margin-right:200px;">
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                       <h4> Change Password</h4>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-6">
                            <form  role="form" name="form1" id="form1" method="post" action="ajax/change_password_post.php">
                           
                          <fieldset>
                         
                               <div class="form-group">
                                  <label>Old Password <span style="color:#F00">*</span></label>
                                  <input  type="text" name="oldpassword" id="oldpassword" value=""  required style="color:#000;" class="form-control">
                                  <input  type="hidden" name="uid" id="uid" value="<?php echo $uid; ?>" class="form-control">
                                 
       <input type="hidden" class="form-control" placeholder="Password" value="<?php echo $pass; ?>" name="holdpassword" id="holdpassword">
                                    
                                        </div>
                                        <div class="form-group">
                                  <label>New Password <span style="color:#F00">*</span></label>
                                  <input  type="text" name="newpassword" id="newpassword" value="" style="color:#000;"  required class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).{8,}" title="Must contain minimum one number and one uppercase and lowercase letter, 1 special character like (@,#,$,%,&) and minimum 8 or more characters" >
                                    
                                        </div>
                                         <div class="form-group">
                                  <label> Confirm New Password <span style="color:#F00">*</span></label>
                                  <input  type="text" name="cnfpassword" id="cnfpassword" value="" style="color:#000;"  required class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).{8,}" title="Must contain minimum one number and one uppercase and lowercase letter, 1 special character like (@,#,$,%,&) and minimum 8 or more characters">
                                    
                                        </div>
                                        <div class="form-group">
                                  
                                    
                                        </div>
                                        </fieldset>
                                        
                                         <button type="submit" class="btn btn-success" name="submit" id="submit" tabindex="6">Change Password</button>
                                        <button type="reset" class="btn btn-primary" name="reset" id="reset" tabindex="7">Reset</button>
                               </form>          
                                       
                            </div>
                            
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
        
            
            <!-- /.container-fluid -->
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
    <script src="../js/jquery.validate.js"></script> 
    
   <!-- <script>
   
	$(document).ready(function(e) {
		menuItemalertFunc();
        
    });
	</script>
    -->
  
    
 <script type="text/javascript">
 $(document).ready(function(){
	 $("#form1").validate({
		 rules: {
				oldpassword: {required: true, equalTo: "#holdpassword"},
				newpassword: {required: true,},
    		    cnfpassword: {required: true, equalTo: "#newpassword"}
				},
        messages: {
        		oldpassword: {required: 'Please enter password', equalTo: 'Please enter correct Old Password'},
				newpassword: {required: 'Please enter new password'}, 
    		    cnfpassword: {required: 'Please enter confirm password', equalTo: 'Password does not match'}
		        }
      });	
	});
  </script>
    
 
</body>

</html>
