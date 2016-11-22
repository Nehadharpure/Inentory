
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
    
    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    
    
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
                         <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li> 
                     
                        
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
					&nbsp;&nbsp;&nbsp;&nbsp;Material Inter-Transfer
                    				</div>
                 <form  id="form1" name="form1" action="Inster_Material_Transfer.php"  method="post" >
				<div class="panel-body">
                
					<div class="row">
						<div class="col-lg-6">
                             <div class="form-group">
                                 <label>Transaction No</label>
                                                               
                                  <?php $getMaterialTransferNo = getMaterialTransferNo();
				                 while($showTransferNo = $getMaterialTransferNo->fetch()){
									 if($showTransferNo['Transaction_Id'] == ''){
							  ?>
                              <input class="form-control" name="transaction_no" id="transaction_no"   readonly value="101" tabindex="-1">
							  <?php }else{?>
                              <input class="form-control" name="transaction_no" id="transaction_no"   tabindex="-1" readonly value="<?php echo $showTransferNo['Transaction_Id']; ?>"> <?php } }?>
                            </div>

                           <div class="form-group">
                             <label>Material Issued By </label>
                         <select class="form-control" name="Issue_By" style="color:#000;" id="Issue_By"  tabindex="0" onChange="$('#item_id').attr('disabled',false);msg_geogselection();locpass_toitem();"  >
                                   <option value="">Select Issuing Department</option>    
                                  <?php $Showlocation_detail = getlocationout_detail();
				                 while($location_detail = $Showlocation_detail->fetch()){
							  ?>
                       <option value="<?php echo $location_detail['Geog_Id']; ?>"><?php echo $location_detail['Location']; ?></option>
                            <?php } ?>   
                         </select>
                       </div>
                     </div>
                   <!-- /.col-lg-6 (nested) -->
                       <div class="col-lg-6">
                           <div class="form-group" >
                                 <label> Transaction  Date</label>
                                    <div>
                       <input type="text" class="form-control" id="datepicker"  tabindex="1" style="text-align:left; color:#000;" name="datepicker" value="" placeholder="dd-mm-yy"   onKeyDown="$('#item_id').select2('focus');"  onBlur="$('#item_id').select2('focus');" >
                               </div>                                        
                            </div> 
                                          
                          <div class="form-group">
                            <label>Material Issued To </label>
                              <select class="form-control" name="Issue_To" style="color:#000;" id="Issue_To"  tabindex="0" onChange="msg_geogselection();" >
                                    <option value="">Select Receiving Department</option>    
                                  <?php $Showlocation_detail = getlocationout_detail();
				                 while($location_detail = $Showlocation_detail->fetch()){
							  ?>
                               <option value="<?php echo $location_detail['Geog_Id']; ?>"><?php echo $location_detail['Location']; ?></option>
                                    <?php } ?>   
                               </select>
                             </div> 
                            </div>
                        <!-- /.col-lg-6 (nested) -->
                      </div>
                            <!-- /.row (nested) -->
                            <!--table-->
                            
                            <!--end of table-->
                            
                          
                        </div>
                        <!-- /.panel-body -->
						   <input type="hidden" id="ele" name="ele" value="0" tabindex="-1">
                            <input type="hidden" id="element" name="element" value="" tabindex="-1">
                             <input type="hidden" id="element1" name="element1" value="0" tabindex="-1">
                              <input type="hidden" id="delcount" name="delcount" value=" "  style="width:30%;height:auto" tabindex="-1"> 
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
                                                <th> Qty </th>
                                                <th  colspan="2" class=" no-link last"><span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
										
										<td>
<div id="item_of_interdept">
										<select  class="form-control select2_single"  name="item_id" id="item_id" style="color:#000;" tabindex="2" onChange="getItemName(this.value);checkids(this.value);" disabled > 
                                                                        <option value="">Select Material </option>
										 <?php $getItemId = getStockItemId();
				                              while($showItemId = $getItemId->fetch()){
							                ?>
                                            
                             <option value="<?php echo $showItemId['Item_Id']; ?>"><?php echo $showItemId['Item_Name']; ?></option>
                                          <?php } ?>                     
                                            </select></div> </td>
										<td>
                                            <div id="dis_itemnm">
                                           <input class="form-control" name="item_nm" id="item_nm" tabindex="-1"  readonly value="" >
                                           </div> </td>
										<td><div id="dis_unitmeasure">
                                           <input class="form-control" name="unit_measure" id="unit_measure"  tabindex="-1" readonly value="">
                                           </div> </td>
                                           <td><div id="dis_avlqty">
                                           <input class="form-control" name="avlqty" id="avlqty" tabindex="-1" value="" readonly>
                                           </div> </td>
										<td> <div>
                           <input class="form-control" name="qty" id="qty" value=""  tabindex="3" onChange="chk_Avlqty(this.value);"></div></td>
										
				<td colspan="" ><button type="button" class="btn btn-success" name="add"  id="add" disabled onClick="addDetails();" tabindex="5"  onBlur="$('#item_id').select2('open');" >Add</button></td>
									   <tbody id="tbId" >
                                            
                                        </tbody>

                                    </table>
                                
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="form-group" align="center">
                    <button type="submit" class="btn btn-success" name="submit" disabled id="submit"   onClick="getcount();ValidateForm(this.form)" >Submit</button>
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
                    	Are you sure, You want to delete Material  <span id="delItem"></span> ?
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
    <!-- javascript validation file -->
   
    <!--datepicker-->
    <script>
	
 
	  
  $(function() {
    $( "#datepicker" ).datepicker(
                    {
                        buttonImage: "calendar.gif",
                        buttonImageOnly: true,
						autoSize: false,
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
	   }
	   function get_docref()
	   {
		    document.getElementById('div_docref').style.display = "block";
		    document.getElementById('div_datepicker').style.display = "block";
	   }
	   </script>
       <script>
	   function getItemName(id)
	   {
		   $("#add").attr("disabled", false);
		   var selectItemId = $('#item_id option:selected' ).val();
		   var selectIssueby = $('#Issue_By option:selected' ).val();
	   
	 //  $('#category_id').val(selectText);
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
						url: 'ajax/ajax_get_avlqtyinterdep.php',
						data: {'selectItemId':selectItemId,'selectIssueby':selectIssueby},
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
				//var avlqty = $('#avlqty').val();
				//alert(avlqty);
				//var selectText = $('#menuItem option:selected' ).text();
				 var itemid = $('#item_id option:selected' ).text();
				// alert(itemid);
				 var qty = $('#qty').val();
				 var unit_measure = $('#unit_measure').val();
				 var item_nm = $('#item_nm').val();
				 var avlqty = $('#avlqty').val();
				  //alert(itemid);
				  
				 if(itemid != '' && qty !='' && unit_measure != '' && item_nm !='' && avlqty !='' )
				{
					
				var count = $('#ele').val();
				var cntvar = parseInt(count)+1;                      
                var nId = $('#ele').val(cntvar);
				var itemid = $('#item_id option:selected' ).text();
				var itemid_tbl = $('#item_id option:selected' ).val();
				
				var item_nm = $('#item_nm').val();
				var qty = $('#qty').val();
				//var avlqty = $('#avl_qty').val();
			    var unit_measure = $('#unit_measure').val();
				var avlqty = $('#avlqty').val();
				
				$("#submit").attr("disabled", false);
				$("#dis_button *").attr("disabled", false);
				$("#del_button *").attr("disabled", false);
				
			    rowCount++;
				var rowCreate ='<tr id="rowCount'+count+'"><td >'+itemid+'<input class="qtyss" name="itemidnew'+count+'" id="itemidnew'+count+'" type="hidden" value="'+itemid_tbl+'"/></td><td>'+item_nm+'<input name="itemnew_nm'+count+'" id="itemnew_nm'+count+'" type="hidden" value="'+item_nm+'"/><input  name="itemnamenew'+count+'" id="itemnamenew'+count+'" type="hidden" value="'+itemid+'"/></td><td>'+unit_measure+'<input name="unitnew_measure'+count+'" id="unitnew_measure'+count+'" type="hidden" value="'+unit_measure+'"/></td><td>'+avlqty+'<input  name="avlqtynew'+count+'" id="avlqtynew'+count+'" type="hidden" value="'+avlqty+'"/></td><td>'+qty+'<input class="qty" name="qty'+count+'" id="qty'+count+'" type="hidden" value="'+qty+'"/></td><td><div id="dis_button"><button type="button" id="editbtn'+count+'" class="btn btn-primary" name="editbtn'+count+'" id="editbtn'+count+'" onClick="editstockOut_record('+count+',this);">Edit</button></div></td><td><div id="del_button"><button type="button" name="delrow'+count+'" id="delrow'+count+'" data-toggle="modal" data-target="#deleterow" onClick="delete_rowcount('+count+');" class="btn btn-danger">delete</button></div></td></tr>';
				
				//$(this).addClass('btn btn-success'); $(this).text('Save');
			
               $('#tbId').append(rowCreate);
                      $('html, body').animate({
                           scrollTop: $("#rowCount"+count).offset().top
                       }, 100);
			
			  
			  // $('#item_id').val('');
			   $('#item_nm').val('');
			   $('#qty').val('');
			   $('#avlqty').val('');
			  
			   $('#unit_measure').val('');
			   $('#selectText').focus();
			   $('#item_id').select2('val','');
			 
			
		
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
				 
				var itemnew_nm = $('#itemnew_nm'+cnt).val();
				//alert(itemnew_nm);
				$('#delItem').text(itemnew_nm);
				$('#delcount').val(cnt);
				//$('#rowCount'+cnt).css('background', '#d6c7dc');
            }
			
			 function removeRow(remcount)<!--delete paticular row from table-->
			  {
				 $("#rowCount"+remcount).remove();
		      }
           
		   
		   
		  function editstockOut_record(cnt,id)
            {
			      
				var a=$('#itemnew_nm'+cnt).val();
				var b=$('#itemnew_nm'+cnt).val();
				var c=$('#unitnew_measure'+cnt).val();
				var d=$('#avlqtynew'+cnt).val();
				var e=$('#qty'+cnt).val();
				var f=$('#pricenew'+cnt).val();
				var g=$('#avlqtynew'+cnt).val();

			        $('#rowCount'+cnt).remove();
			  
			        $('#item_id').val(a).change();
				$('#item_nm').val(b);
				$('#unit_measure').val(c);
				$('#avlqty').val(d);
				$('#qty').val(e);
				$('#price').val(f);
				$('#avlqty').val(g);


				$("#dis_button *").attr("disabled", "disabled");
				$("#del_button *").attr("disabled", "disabled");
			        $('#item_id'+cnt).focus();
						  
            }
	
       </script>
      <!-- validation for quantity--->
      <script>
      function chk_Avlqty(valqty)
      {
		 // alert(valqty);
		 var qtye =  parseInt ($('#qty').val());
          var avlqty = parseInt ($('#avlqty').val());
	     // alert(avlqty);
		 //  alert(qtye);
	      if(valqty > avlqty)
	     {
		    alert('Quantity is greater than Available Quantity');  
		    $('#qty').val('');
            $('#qty').focus();
		 }
		 else if(valqty < avlqty) 
		 {
			  $('#price').focus();
		 }
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
 <script>
  function pointer()
  {
	//alert('hi');  
	$('#item_id').focus(); 
	 document.getElementById('item_id').focus();
  }
  
  </script>
 
 
  <script>
  $(document).ready(function(){
    $("#form1").validate({
		  ignore: ":hidden",
  rules: {
	
	  
	  Issue_By: {required: true},
	  Issue_To: {required: true},
	  datepicker: {required:true},
	 
    },
  messages: {
	 // Geog_Id: {required: 'Select Geog ID'},
	  Issue_By: {required: 'Please Select Issue By Department'},
	  Issue_To: {required: 'Please Select Issue To Department'},
	  datepicker: {required: 'Please Select Transaction Date'},
	
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
   $('#datepicker').focus();
	 
	 
 }
 function pointed1()

 {
   $("#item_id").focus();
	 
	
 }
function pointed2()

 {
   $('#qty').focus();
	 
	
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
 <!--validate the selection of issue by and issue to geog-->      
<script>
function msg_geogselection()
{
	var issueby = $('#Issue_By option:selected' ).val();
	var issueto = $('#Issue_To option:selected' ).val();
	if(issueby == issueto)
	{
		alert('select different department');
	}
	else
	{
		$('#item_id').focus();
	}
	
}


function locpass_toitem()
{
	var issueby = $('#Issue_By option:selected' ).val();
               $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_displayitem.php',
						data: {'issueby':issueby},
						success: function(data){
							
							
							$('#item_of_interdept').html(data);
							//$('#qty').focus();
							
							
					}, 
		   			
		}); 	
	
}

</script>
       
</body>

</html>

