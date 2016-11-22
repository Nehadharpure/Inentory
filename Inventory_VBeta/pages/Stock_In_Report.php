
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
     
     <!-- Datepicker -->
     <link rel="stylesheet" type="text/css" href="../datepicker/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="../datepicker/jquery.comiseo.daterangepicker.css">
 
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
	<!-- DataTable -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
   <!-- <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->
      

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
	.white
	{
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
                        <li><a href="User_register.php"><i class="fa fa-user fa-fw"></i> User Registration</a>
                        </li>
                        <li><a href="change_password.php"><i class="fa fa-gear fa-fw"></i> Change Password</a></li>
                        
                        <li class="divider"></li>
                        <li> <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li> 
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

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                    <a href="index.php"><span style="color:#23527c" class="glyphicon glyphicon-home"></span></a>
					&nbsp;&nbsp;&nbsp;&nbsp;Material Received Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form role="form" name="form1" id="form1" action="ajax/stockin_post.php" method="post">
							<div class="col-lg-6">
							<div class="form-group" id="div_datepicker" >
                              <label>From Date</label>
                               <div >
                     <input style = "width:50%;text-align:left;" class="form-control"  type="text" id="datepicker1" name="datepicker1" placeholder="dd-mm-yy" style="color:#000;" onChange="valid_date();" ></input> 
							   </div>



                                          
                                       
                                           
                                        </div> 
                                       
							</div>
							<div class="col-lg-6">
							<div class="form-group" id="div_datepicker" >
                              <label>To Date</label>
                               <div>
             <input  style="width:50%;" class="form-control"  type="text" id="datepicker2" name="datepicker2" placeholder="dd-mm-yy" style="color:#000;text-align:left;" onChange="valid_date();"  ></input> 
							   </div>
                                           
                              </div> 
                                <span hidden="hidden" style="color:red;margin-left:-397px" id="errmsg">Please Select the Dates</span>
							</div>
                          
                            <div class="col-lg-6">                            
                               <div id="sandbox-container">
<button type="button" onClick="gettableval($('#datepicker1').val(),$('#datepicker2').val())" class="btn btn-primary" name="apply" id="apply">Apply</button>


							   </div>
							</div>
                            
							<!--<div class="col-lg-12">
							<center>
							
							<button type="submit" class="btn btn-success" name="export" id="export" tabindex="">Export</button>
							</center></div>-->
							</form>
                            
                        </div>
                        <!-- /.panel-body -->
                        
                        
                        <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                            <div id="tablestockin">
                            <a href="#"  class="btn btn-success btn-sm" style="margin-left: 863px;float:right;">
          <span class="glyphicon glyphicon-file">Export Excel</span>
        </a>
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
                                    <thead style="background-color:#23527c; color:#FFF;">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Date</th>
                                            <th>Transaction Id</th>
                                            <th>Supplier</th>
                                            <th>Challan Date</th>
                                            <th>Doc.Ref.No.</th>
                                             <th>Issued By</th>
                                              <th>Material</th> 
                                              <th>U.O.M</th> 
                                              <th>Qty</th>
                                               <th>Price</th>
                                               
                                        </tr>
                                    </thead>
                                   
                                      
                                         <tbody id="tbId">
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                            </tbody>
                                       
                                    
                                </table>
                                </div>
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
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   
  
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
      <script src="../js/jquery-ui.js"></script>
   <script src="../timepicker/date/bootstrap-datepicker.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!--Datepicker -->
   

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



     <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script> 
  <script type="text/javascript" src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
	
<!--datepicker-->
   <script src="../datepicker/moment.min.js"></script>
   <script src="../datepicker/jquery.comiseo.daterangepicker.js"></script>
   

    
    <script src="../js/validate.min.js"></script>
    
   
    
    
 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	</script>


 <!--datepicker  maxDate: 'now'-->

 <script>
 
	  
  $(function() {
    $( "#datepicker1" ).datepicker(
                    {
                        buttonImage: "calendar.gif",
                        buttonImageOnly: true,
						autoSize: true,
                        showButtonPanel: true ,
                        closeText: "Close",        
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "dd-mm-yy" ,
			maxDate: "now"
                    });
  });
  
   $(function() {
    $( "#datepicker2" ).datepicker(
                    {
                        buttonImage: "calendar.gif",
                        buttonImageOnly: true,
			autoSize: true,
                        showButtonPanel: true ,
                        closeText: "Close",        
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "dd-mm-yy" ,
			maxDate: "now"
                    });
  });
  
	
  </script>
    
    
       <!-- end datepicker-->
       



    
    
 <script>
 function gettableval(date1,date2)
 {
		
	
		 $.ajax({ 
						type: "POST",
						url: 'ajax/stockin_post.php',
						data: {'date1':date1,'date2':date2},
						success: function(data){
							//alert(data);
							$('#tablestockin').html(data);
					},
		});		 
	

 }
 
 
 function show_pdf1()
 {
	 
	 
	 var startdate =$('#datepicker1').val();
	 var endate =$('#datepicker2').val();
	 $.ajax({ 
						type: "POST",
						url: '../mpdf60/examples/stockIn_pdf.php',
						data: {'startdate':startdate,'endate':endate},
						success: function(data){
							//alert(data);
							//$('#tablestockin').html(data);
					},
		});		 
	 
	 
 }
 </script>
 
</body>

</html>
