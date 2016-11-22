
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
   
    <!-- Datepicker -->

    <link rel="stylesheet" type="text/css" href="../datepicker/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="../datepicker/jquery.comiseo.daterangepicker.css">
    
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- DataTable -->
     
     <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
     <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- Datepicker -->
    
     <!-- Select2 -->
   <link rel="stylesheet" type="text/css" href="../select2/dist/css/select2.min.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!--datepicker-->
     <style>
	 .error
	 {
	   color:#F00;
	   
	 }
	 .white{
	
color:#FFF;	
}

	 </style>
     <script>
	 
	 $(function() {
    $( "#datepicker1" ).datepicker({  maxDate: new Date() });
  });
  
   $(function() {
    $( "#datepicker" ).datepicker({  maxDate: new Date() });
  });
	 </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#23527c;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color:#FFF;"  href="#">Inventory Management</a>
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

<div id="page-wrapper">
  <div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
            
				<div class="panel-heading">
					<a href="index.php"><span style="color:#23527c" class="glyphicon glyphicon-home"></span></a>
					&nbsp;&nbsp;&nbsp;&nbsp;Material Received Transaction
				</div>
                 <form  id="form1" name="form1" action="ajax/InsertStockIn_tran.php"  method="post" >
				<div class="panel-body">
                
					<div class="row">
						<div class="col-lg-6"><!--ajax/InsertStockIn_tran.php-->
                           
                               <div class="form-group">
                                  <label>Location </label>
                                  <?php $getlocation_Id = getLocationId();
								  while($showlocation_Id = $getlocation_Id->fetch()){
							   ?>
								  
                      <input class="form-control" tabindex="-1" readonly name="geog_id1" id="geog_id1" placeholder=" " value="<?php echo $showlocation_Id['Location'] ?>">
<input class="form-control" tabindex="-1" type="hidden" readonly name="geog_id" id="geog_id" placeholder=" " value="<?php echo $showlocation_Id['Geog_Id'] ?>">
                                          
<?php } ?>
                                           
                                        </div>
                                        
                                          <div class="form-group" >
                                            <label> Transaction  Date</label>
                                            <div>
                                          
                                        <input type="text" class="form-control" id="datepicker"  tabindex="0" style="text-align:left" name="datepicker" value="" onBlur="pointed()" onKeyDown="$('#supplier_nm').focus();" placeholder="dd-mm-yy" >
                                              </div>                                      
                                       </div>
                                        
                               
										<div class="form-group" style="display:none;" id="Inhouse_detail" >
                                            <label>In-House </label>
                                           <select class="form-control" name="Inhouse_nm" style="color:#000;" id="Inhouse_nm" tabindex="-1" onBlur="pointed()">
                                              <option value="">Select In-House</option>    
                                  <?php $Showlocation_detail = getlocation_detail();
				                 while($location_detail = $Showlocation_detail->fetch()){
							  ?>
                                 
                                                <option value="<?php echo $location_detail['Geog_Id']; ?>"><?php echo $location_detail['Location']; ?></option>
                                            <?php } ?>   
                                            </select>
                                        </div>
                                    
                               <div class="form-group" style="display:none" id="div_docref">
                                            <label>Reference Number</label>
                                            <input class="form-control" name="docref_no" id="docref_no" placeholder="Enter Document Reference Number "  tabindex="2"  onBlur="pointed1()">
                                           
                                        </div>
                                       
                                         
                                        
                                        
                                        
                                        
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                    
                                       
                                            <div class="form-group">
                                                <label>Transaction No</label>
                                                               
                                  <?php $getTransactionNo = getTransactionNo();
				                 while($showTransactionNo = $getTransactionNo->fetch()){
									 if($showTransactionNo['Transaction_Id'] == ''){
							  ?>
                              <input class="form-control" name="transaction_no" id="transaction_no"   readonly value="101" tabindex="-1">
							  <?php }else{?>
                              <input class="form-control" name="transaction_no" id="transaction_no"   tabindex="-1" readonly value="<?php echo $showTransactionNo['Transaction_Id']; ?>"> <?php } }?>
                                            </div>


 <div class="form-group"  id="supplier_detail" >
                                            <label>Supplier Name</label>
                                           <select class="form-control" tabindex="1" name="supplier_nm" id="supplier_nm" style="color:#000;" onChange="get_docref()"  >     
                               <option value="">Select Supplier</option>
                                                
                                  <?php $ShowSupplier_detail = getsupplier_detail();
				                 while($getSupplier_detail = $ShowSupplier_detail->fetch()){
							  ?>
                                  
                                     <option value="<?php echo $getSupplier_detail['Supplier_Id']; ?>"><?php echo $getSupplier_detail['Supplier']; ?></option>
                                            <?php } ?>   
                                            </select>
                                        </div>
                                            
                                            <div class="form-group" style="display:none;">
                                            <label>Material Received From</label>
                                    <div class="radio">
                                          <label >
                                                <input type="radio" name="stock_receive_from" id="stock_receive_from" value="option1" tabindex="-1" onClick="supplier_detail()" tabindex="1" >  Supplier
                                            </label>
                                        
                                            
                                            <label>
                                                <input type="radio" name="stock_receive_from" id="stock_receive_from1" tabindex="-1" value="option2" onClick="Inhouse_detail()" tabindex="">In-House
                                            </label>
                                            </div>
                                        </div>
                                        
                                <div class="form-group" id="div_datepicker" style="display:none;">
                                            <label> Refrence Document Date</label>
                                           <div>
                                             <input type="text" class="form-control" id="datepicker1"  style="text-align:left" name="datepicker1" value=""  tabindex="3" placeholder="dd-mm-yy" >
                                             </div> 
                                       
                                        
                                     
                                  
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                            <!--table-->
                            
                            <!--end of table-->
                            
                          
                        </div>
                        <!-- /.panel-body -->
						   <input type="hidden" id="ele" name="ele" value="0">
                            <input type="hidden" id="element" name="element" value="">
                             <input type="hidden" id="element1" name="element1" value="0">
                              <input type="hidden" id="delcount" name="delcount" value=" "  style="width:30%;height:auto"> 
                       <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="example" style="width:100%;">
                                 <thead style="background-color:#23527c; color:#FFF;">
                                            <tr class="headings">
                                                
                                                <th  style="width:160px;">Material</th>
                                                <th>Material Id</th>
                                                <th>U.O.M.</th>
												<th>S.I.H</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th  colspan="2" class=" no-link last"><span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
	                                <td>
					<select  class="form-control select2_single"  name="item_id" id="item_id" style="color:#000;" onChange="getItemName();checkids(this.value);" tabindex="4">
                                          <option value="">Select Material </option>
						 <?php $getItemId = getItemId();
				                     while($showItemId = $getItemId->fetch()){
							                ?>
                                            
                             <option value="<?php echo $showItemId['Item_Id']; ?>"><?php echo $showItemId['Item_Name']; ?></option>
                                          <?php } ?>                     
                                            </select> </td>
										<td>
                                            <div id="dis_itemnm">
                                           <input class="form-control" name="item_nm" id="item_nm"  readonly value="" tabindex="-1">
                                           </div> </td>
										<td><div id="dis_unitmeasure">
                                           <input class="form-control" name="unit_measure" id="unit_measure"  readonly value="" tabindex="-1">
                                           </div> </td>
										   <td>
                                            <div id="dis_avlqty">
                                           <input class="form-control" name="avlqty" id="avlqty"  readonly value="" tabindex="-1">
                                           </div> </td>
										<td> <div>
                           <input class="form-control" name="qty" id="qty" value="" tabindex="5"></div></td>
										<td><div>
                           <input class="form-control" name="price" id="price" value="" tabindex="6"></div> </td>
				<td colspan="2" ><button type="button" class="btn btn-success" name="add" id="add" disabled onClick="addDetails();"  onBlur="$('#item_id').select2('open');"  tabindex="7">Add</button></td>
					<tbody id="tbId" >
                                            
                                        </tbody>

                                    </table>
                                
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="form-group" align="center">
                    <button type="submit" class="btn btn-success" name="submit" disabled id="submit" onClick="getcount();ValidateForm(this.form)" >Submit</button>
                                       <!-- <button type="reset" class="btn btn-primary">Reset</button></div>-->
                    </div>
                    <!-- /.panel -->
                     </form>
                     
                     <div class="modal fade" id="deleterow" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                    	Are you sure, You want to delete Material Id <span id="delItem"></span> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelorder" name="cancelorder" class="btn btn-primary" onClick="removeRow($('#delcount').val());" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="cancdl();">No</button>        
                    </div>
                </div> <!-- /.modal-content -->        
            </div>  <!-- /.modal-dialog -->        
        </div>
                     
                     
                     
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
   <script src="../js/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
     <!--Datepicker -->
     <script src="../timepicker/date/bootstrap-datepicker.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
     <script src="../js/jquery.validate.js"></script> 
   <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script> 
    <script type="text/javascript" src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script> 
    
     <!-- Select2 -->
   <script src="../select2/dist/js/select2.full.min.js"></script>

   <!--datepicker-->
   <script src="../datepicker/moment.min.js"></script>
   <script src="../datepicker/jquery.comiseo.daterangepicker.js"></script>
   
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
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
    $( "#datepicker" ).datepicker(
                    {
                        buttonImage: "calendar.gif",
                        buttonImageOnly: true,
			autoSize: true,
                        autoOpen: false,
                        showButtonPanel: true ,
                        closeText: "Close",        
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: "dd-mm-yy" ,
			maxDate: "now"
                    });
                     $("#datepicker").focus();

  });
  
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
  
	
  </script>
    
    
       <!-- end datepicker-->
       
       
       <script>
	   function supplier_detail()
	   {
		 // alert('hi'); 
		   document.getElementById('supplier_detail').style.display = "block";
		   document.getElementById('Inhouse_detail').style.display = "none";
		  $('#supplier_nm').focus();
		   
	   }
	   function Inhouse_detail()
	   {
		  //alert('hello'); 
		    document.getElementById('supplier_detail').style.display = "none";
		    document.getElementById('Inhouse_detail').style.display = "block";
			// $('Inhouse_detail').removeAttr('height');
			// document.getElementById('Inhouse_detail').style.height= "none";
			document.getElementById('div_docref').style.display = "none";
		    document.getElementById('div_datepicker').style.display = "none";
			  $('#Inhouse_nm').focus();
		   
	   }
	   function get_docref()
	   {
		    document.getElementById('div_docref').style.display = "block";
		    document.getElementById('div_datepicker').style.display = "block";
			 // $('#docref_no').focus();
	   }
	   </script>
       <script>
	   function getItemName()
	   {
		   $("#add").attr("disabled", false);
		   var selectItemId = $('#item_id option:selected' ).val();
		
		   
	   if(selectItemId  != undefined)
	 {
	   $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_getstockIn_Item_nm.php',
						data: {'selectItemId':selectItemId},
						success: function(data){
							//alert(data);
							$('#dis_itemnm').html(data);
							//$('#dis_unitmeasure').html(data);
							
					},
					 
					
		});  

		  $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_getstockIn_unitmeasure.php',
						data: {'selectItemId':selectItemId},
						success: function(data){
							//alert(data);
							//$('#dis_itemnm').html(data);
							$('#dis_unitmeasure').html(data);
							
					}, 
		   			
		});  
		$.ajax({ 
						type: "POST",
						url: 'ajax/ajax_getstockIn_Avlqty.php',
						data: {'selectItemId':selectItemId},
						success: function(data){
							//alert(data);
							//$('#dis_itemnm').html(data);
							$('#dis_avlqty').html(data);
							$('#qty').focus();
							
					}, 
		   			
		});  
	 }
	   }
	   
	   </script>
       <script>
         var rowCount = 1;
			function addDetails()
            {
				//alert('hi');
				var itemid = $('#item_id option:selected' ).text();
				var qty = $('#qty').val();
			    var unit_measure = $('#unit_measure').val();
				var item_nm = $('#item_nm').val();
				 if(itemid != '' && qty !='' && unit_measure != '' && item_nm !=''  )
				{
				var count = $('#ele').val();
				var cntvar = parseInt(count)+1;                      
                var nId = $('#ele').val(cntvar);
				var itemid = $('#item_id option:selected' ).text();
				var itemid_tbl = $('#item_id option:selected' ).val();
				
				var item_nm = $('#item_nm').val();
				var qty = $('#qty').val();
				var avlqty = $('#avlqty').val();
				var price = $('#price').val();
			    var unit_measure = $('#unit_measure').val();
				
				$("#submit").attr("disabled", false);
				//$("#dis_button").attr("disabled", false);
				//document.getElementById('#dis_button').disabled = false;
				
				
				$("#dis_button *").attr("disabled", false);
				$("#del_button *").attr("disabled", false);
				
			
				//document.getElementById('dis_button').style.pointerEvents = 'auto';
				// To re-enable:
               // document.getElementById('dis_button').style.pointerEvents = 'auto'; 
				//$("#dis_button *").attr("enabled", "enabled").unbind('click');
				
			   // rowCount++;
				var rowCreate ='<tr id="rowCount'+count+'"><td >'+itemid+'<input class="qtyss" name="itemidnew'+count+'" id="itemidnew'+count+'" type="hidden" value="'+itemid_tbl+'"/></td><td>'+item_nm+'<input name="itemnew_nm'+count+'" id="itemnew_nm'+count+'" type="hidden" value="'+item_nm+'"/></td><td>'+unit_measure+'<input name="unitnew_measure'+count+'" id="unitnew_measure'+count+'" type="hidden" value="'+unit_measure+'"/></td><td>'+avlqty+'<input  name="avlqtynew'+count+'" id="avlqtynew'+count+'" type="hidden" value="'+avlqty+'"/></td><td>'+qty+'<input class="qty" name="qty'+count+'" id="qty'+count+'" type="hidden" value="'+qty+'"/></td><td>'+price+'<input name="pricenew'+count+'" id="pricenew'+count+'" type="hidden" value="'+price+'"/></td><td><div id="dis_button"><button type="button" id="editbtn'+count+'" class="btn btn-primary" name="editbtn'+count+'"  id="editbtn'+count+'"  onClick="editstockIn_record('+count+',this);">Edit</button></div></td><td><div id="del_button"><button type="button" name="delrow'+count+'" data-toggle="modal" data-target="#deleterow" onClick="delete_rowcount('+count+');" class="btn btn-danger">delete</button></div></td></tr>';
				
				//$(this).addClass('btn btn-success'); $(this).text('Save');
			
               $('#tbId').append(rowCreate);
                 $('html, body').animate({
                   scrollTop: $("#rowCount"+count).offset().top
                 }, 100);
			
			   $('#item_id').select2('val','');
			    // $('#item_id').val('');
			   $('#item_nm').val('');
			   $('#qty').val('');
			   $('#avlqty').val('');
			   $('#price').val('');
			   $('#unit_measure').val('');
                             $('#item_id').select2('focus')
			   //$('#item_id').select2.focus();
               //$("#dis_button").attr("disabled", false);
			
		
         }
	}
		 
        </script>
                    
       <!-- submit  -->
       <script>
        function getcount()
        {	
            var endval = '';
			
            $("#example .qty").each(function()
            {
                var qtid= $(this).attr("id");
				//alert(qtid);
                var l = qtid.substr(3,3);
			   //alert(l);
               endval=endval+l+',';
				//alert(endval);
              var ele = $('#element1').val(endval);
			  //alert(ele);
            });
            }
			
			function delete_rowcount(cnt) <!--delete item-->
             {
				 
				var itemnew_nm=$('#itemnew_nm'+cnt).val();
				//alert(itemnew_nm);
				$('#delItem').text(itemnew_nm);
				$('#delcount').val(cnt);
				//$('#rowCount'+cnt).css('background', '#d6c7dc');
            }
			
			 function removeRow(remcount)<!--delete paticular row from table-->
			  {
				 $("#rowCount"+remcount).remove();
		      }
           
		   
		   
		  function editstockIn_record(cnt,id)
            {
				
				var a=$('#itemnew_nm'+cnt).val();
				var b=$('#itemnew_nm'+cnt).val();
				var c=$('#unitnew_measure'+cnt).val();
				var d=$('#avlqtynew'+cnt).val();
				var e=$('#qty'+cnt).val();
				var f=$('#pricenew'+cnt).val();

			        $('#rowCount'+cnt).remove();

			        $('#item_id').val(a).change();
			        $('#item_nm').val(b);
				$('#unit_measure').val(c);
				$('#avlqty').val(d);
				$('#qty').val(e);
				$('#price').val(f);

                
			         $("#dis_button *").attr("disabled", "disabled");
				 $("#del_button *").attr("disabled", "disabled");
				 document.getElementById('dis_button').disabled = true;
			         $('#item_id'+cnt).focus();
						  
            }
	
       </script>
      
       
       
        <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select Material",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

 <!--<script LANGUAGE="JavaScript">
function ValidateForm(form){
ErrorText= "";
if ( ( form.stock_receive_from[0].checked == false ) && ( form.stock_receive_from[1].checked == false ) ) 
{
alert ( "Please choose Stock Received From: Supplier or Inhouse" ); 
return false;
}
if (ErrorText= "") { form.submit() }
}
</script>-->
 
 
  

 
  <script>
  $(document).ready(function(){
    $("#form1").validate({
		  ignore: ":hidden",
  rules: {
	
	  stock_receive_from: {required: true},
	  supplier_nm: {required: true},
	  Inhouse_nm: {required: true},
	  datepicker1: {required:true},
	  datepicker: {required: true},
	  docref_no: {required: true},
	  element: {required: true},
	 // item_id: {required: true},
	  //item_nm: {required: true},
	 // qty: {required: true},
	 // price: {required: true},
	   
	   
    },
  messages: {
	 // Geog_Id: {required: 'Select Geog ID'},
	
	  stock_receive_from: {required: 'Please Select  stock received from'},
	  supplier_nm: {required: 'Please Select Supplier Name'},
	  Inhouse_nm: {required: 'Please Select Inhouse'},
	  datepicker1: {required: 'Please Select Transaction Date'},
	  datepicker: {required: 'Please Select Reference Document Date'},
	  docref_no: {required: 'Please Enter the Reference Doc No.'},
	  element: {required: 'Please Enter element.'},
	 // item_id: {required: 'Please Select Item Id'},
	 // qty: {required: 'Please Enter the Quantity'},
	//  price: {required: 'Please Enter the Price'},
	 
	
  }
});
  });
  </script>
  <script>
   $('#qty').keypress(function (e) {
         if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                     $('#qty').html(" Please Enter Digits Only").show();
                          return false;
        }
        else if(($('#qty').val())=='' && e.which == 48)
       {
            
            return false;
       }
        
       }); 
	   
	  
  </script>
  <script>
   $('#price').keypress(function (e) {
         if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                     $('#price').html(" Please Enter Digits Only").show();
                          return false;
        }
        else if(($('#price').val())=='' && e.which == 48)
       {
            
            return false;
       }
        
       });
  
  </script>
  <script>
   function pointed()
   {
	 $('#supplier_nm').focus(); 
  
	   
   }
 function pointed1()
   {
	 $('#datepicker1').focus(); 
  
	   
   }
 function pointed2()
   {
	 $('#item_id').focus(); 
  
	   
   }

 function pointed3()
   {
	// $("#item_id").select2.("focus"); 
  
	   
   }



  </script>
  <!--check the duplicate item id in table-->
<script>
function checkids(id)
{
	
	 var myArray = [];	
	$("#example .qtyss").each(function(){
		var qtid= $(this).val();
		myArray.push(qtid);
			
	});
	 if(jQuery.inArray( id,myArray ) != -1) 
        { 
		  alert('Item is Already Present in List');
		  $("#add").attr("disabled", true);
		  
		       
		
		}
		
}
</script>
       
</body>

</html>

