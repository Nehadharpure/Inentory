
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
	<!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="../timepicker/date/datepicker3.css">
    <!-- DataTable -->
      <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->
     
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
					&nbsp;&nbsp;&nbsp;Reorder Details Report
                        <span style="float:right"><?php $d=date('d-m-Y'); echo "Date:".$d;?></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            
                        </div>
                        <!-- /.panel-body -->
                        
                        
                        <div class="panel panel-default"><!--../mpdf60/examples/Reorder_detail_pdf.php-->
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                            <div id="tablestockin">
							<a href="ajax/reorder_detail_excel.php"  class="btn btn-success btn-sm" style="margin-left: 863px;float:right;">
          <span class="glyphicon glyphicon-file">Export Excel</span>
        </a>
                          <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
                                    <thead style="background-color:#23527c; color:#FFF;">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Material</th>
                                            <th>S.I.H</th> 
                                            <th>Reorder Level</th> 
										</tr>
                                    </thead>
                             <tbody>
                                      <?php $getreorder = reorderreport();
									  $i=1;
									   while($reorder = $getreorder->fetch()){
                                       ?>
                                          
                                          <tr class="odd gradeX">
                                           <td><?php echo $i; ?></td>
                                            <td><?php echo $reorder['Item_Name']; ?></td>
                                            <td><?php echo $reorder['Available_Qty']; ?></td>
                                             <td><?php echo $reorder['Reorder_level']; ?></td>  
                                             </tr>
                                            
                                     <?php $i++;} ?>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!--Datepicker -->
     <script src="../timepicker/date/bootstrap-datepicker.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script> 
    <script type="text/javascript" src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script> 
	<!--datepicker-->
    
    
    
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	</script>
    
    <script>
	$('#sandbox-container input').datepicker({
    autoclose: true,
	todayHighlight :true,
	endDate: '+0d'
	
});

$('#sandbox-container input').on('show', function(e){
    console.debug('show', e.date, $(this).data('stickyDate'));
    
    if ( e.date ) {
         $(this).data('stickyDate', e.date);
    }
    else {
         $(this).data('stickyDate', null);
    }
});

$('#sandbox-container input').on('hide', function(e){
    console.debug('hide', e.date, $(this).data('stickyDate'));
    var stickyDate = $(this).data('stickyDate');
    
    if ( !e.date && stickyDate ) {
        console.debug('restore stickyDate', stickyDate);
        $(this).datepicker('setDate', stickyDate);
        $(this).data('stickyDate', null);
    }
});
</script>
    

</body>

</html>
