
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
					&nbsp;&nbsp;&nbsp;&nbsp;Material Master
				</div>
				<div class="panel-body">
					<div class="row">
                    <div id="dispalyupdate">
                    <form role="form"  name="form1" id="form1"  action="Insert_material_master.php" method="post">
						<div class="col-lg-6">
                         <div class="form-group">
                                  <label>Category Id</label>
                        <input class="form-control" name="category_id" id="category_id"  readonly placeholder=" " value="">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Material Id <span style="color:#F00">*</span></label>
                                            <div id="dis_itemid">
   <input class="form-control" type="text" id="trycatid" name="trycatid" value="" style="width:10%" readonly />
     <input class="form-control" style="width:60%;margin-top: -34px;margin-left: 57px;"   name="item_id" id="item_id"  placeholder="Item Id" autocomplete="off"  value="">
      
   </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Unit of measure(U.O.M.)<span style="color:#F00">*</span></label>
                               <input class="form-control" name="unit_measure" id="unit_measure"  style="text-transform:uppercase;" value="" placeholder="Enter Unit Of Measure " autocomplete="off" tabindex="3" onBlur="msg2(this.value)">
                         <span hidden="hidden" id="msg2" style="color:red">Please Enter the Unit of Measure</span>        
                                        </div>
                                        
                                       
 
                                          
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                               
                                    <div id="discat" class="form-group">
                                    
                                                <label>Category Name<span style="color:#F00">*</span></label>
                                              <select class="form-control"  name="category_nm" id="category_nm" onChange="dis_categoryId(this.value)" style="width:65%;color:#000;" placeholder="Select Existing Category" autofocus tabindex="0">
                                                <option value="">Select Existing Category</option>
                                              <?php $getcategory = Getcategory();
											  while($showcategory = $getcategory->fetch()){
												//  print_r($showcategory);?>
                                              
                                                <option value="<?php echo $showcategory['Item_Category_Id'];?>"><?php echo $showcategory['Item_Category_Name'];?></option> 
												<?php }?>
                                            </select>
                                            
                                            </div>
                                            
                                            
                                            
                                            
										
<span>
<button type="button"  style="margin-top: -50px; float:right;" class="btn btn-success" data-toggle="modal" data-target="#myModalCat" name="cat_modal" id="cat_modal" name="save" onClick="getValue();" tabindex="-1">Add New Category </button></span>                                           
                                             
                                       
    
                                            <div class="form-group">
                                            <label>Material Name<span style="color:#F00">*</span></label>
                                           <input class="form-control" name="item_nm" id="item_nm"  autocomplete="off" placeholder="Enter Item Name " tabindex="2" onBlur="msg1(this.value)">
                                <span hidden="hidden" id="msg1" style="color:red">Please Enter the Item Name First</span>
                                        </div>
                                         <div class="form-group">
                                            <label>Reorder Level<span style="color:#F00">*</span></label>
                                           <input class="form-control" name="reorder" id="reorder" value=""  tabindex="4" placeholder="Enter Reorder Level" onBlur="msg3(this.value)">
                                     <span hidden="hidden" id="msg3" style="color:red">Please Enter the Reorder Level Value</span>
                                        </div>
                                        
                                        
                                        <button type="submit" name="submit" id="submit" onClick="testitem($('#item_nm').val());"  tabindex="5"class="btn btn-success">Submit</button>
                                        <button type="button"  onClick="resetval()" class="btn btn-primary" tabindex="6">Reset</button>
                        
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                            <!--table-->
                            
                            <!--end of table-->
                            
                          
                        </div>
                        <!-- /.panel-body -->
                        
                        
                        <div class="modal fade" id="myModalCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                <label>Add New Category</label>
                             <input class="form-control" style="width:60%;text-transform:uppercase;" autofocus value="" name="newCategory_name" id="newCategory_name" placeholder="Enter Category name"  autocomplete="off" >
                                      <div id="showmassage" style="color:#F00;" hidden="hidden">  Item Category is Already Exist </div>
                                      </div>
                                     
                                        <div class="modal-footer">
                                          
        <button type="submit" id="catsubmit" name="catsubmit" class="btn btn-primary"  data-dismiss="modal" onClick="saveNewCategory();">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        
                                        </div>
                                    </div> <!-- /.modal-content -->
                                   
                                </div>  <!-- /.modal-dialog -->
                              
                            </div>
                            
                            <div class="modal fade" id="deleterow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                
                                   Are You Sure ,You Want to delete Item ID <span id="dis_id1" style="color:#F00"></span> ?
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
                            <div class="dataTable_wrapper" id="dis_table">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
                                    <thead  style="background-color:#23527c; color:#FFF;">
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Category</th>
                                            <th>Material ID</th>
                                            <th>Material Name</th>
                                            <th>U.O.M.</th>
                                            <th>Reorder Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                          
				
                                    <tbody>
                                    <?php $getItem_detail = getItemMaster_details();
									$i=1;
				                              while($showItem_detail = $getItem_detail->fetch()){
							                ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $showItem_detail['Item_Category_Name'];?></td>
                                            <td><?php echo $showItem_detail['Item_Id'];?></td>
                                            <td><?php echo $showItem_detail['Item_Name'];?></td>
                                            <td class="center"><?php echo $showItem_detail['Unit_Of_Measure'];?></td>
                                            <td class="center"><?php echo $showItem_detail['Reorder_level'];?></td>
                                            <td ><center><a href="#" data-toggle="modal" data-target="#deleterow1" onClick="get_update('<?php echo $showItem_detail['Item_Id'];?>')"><span id="edit1" name="edit1" class="fa fa-edit" title="Edit"   style="font-size:24px;"></span></a><a href="#"  data-toggle="modal" data-target="#deleterow" onClick="del_msg('<?php echo $showItem_detail['Item_Id']?>');"><span class="fa fa-times-circle" style="font-size:24px;" title="Delete"></span></a></center></td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                   
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
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
      <script src="../js/jquery.validate.js"></script> 
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script> 
    <script type="text/javascript" src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script> 
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script>
	function getValue()
	{
		$('#newCategory_name').focus();
		
	}
	function dis_categoryId(cat_id)
	{
	 
	// alert(cat_id);
	 $('#category_id').val(cat_id);
	 $.ajax({ 
						type: "POST",
						url: 'ajax/get_itemid.php',
						data: {'cat_id':cat_id},
						success: function(data){
							$('#dis_itemid').html(data);
							$("#item_id").focus();							
					}, 
		   			
		});
		
	}
	function dis_categoryIdd(cat_id)
	{
	 
	
	$('#category_id').val(cat_id);
		
	}
	
	function saveNewCategory()
   {
	   var str = $('#newCategory_name').val();
	   
       var Category_name = str.toUpperCase();
         //alert(Category_name);
	
	if(str=='')
	{
		alert('Enter the Category');
	}
	else
	{
        	
	  $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_insertNewcategory.php',
						data: {'Category_name':Category_name},
						success: function(data){
                                                      //alert(data);

							if(data==5)
							{
                                                         alert('Category Already Exist');							
							//$('#showmassage').show().delay(1000).fadeOut();
							$('#newCategory_name').val('');							
							}
							else
							{
								
								trycates(data);
								$('#newCategory_name').val('');		
							
							}
					},
		});  
	}
   }
   
   
   function get_update(id)
   {
	  
	   $.ajax({ 
						type: "POST",
						url: 'ajax/edit_item_master.php',
						data: {'id':id},
						success: function(data){
							//alert(data);
							$('#dispalyupdate').html(data);
							$(window).scrollTop(0);
						
					},
		});
		 
	   
   }
   
   function del_msg(id)
   {
	  
	  $('#dis_id').val(id);
	  $('#dis_id1').html(id);
   }
   
   
   function delete_partItem(id)
   {
	  
	   $.ajax({ 
						type: "POST",
						url: 'ajax/delete_ItemMaster.php',
						data: {'id':id},
						success: function(data){
							
							$('#dis_table').html(data);
							window.location.reload();
						
					},
		});
		 
	   
   } 
   
   function testitem66(itemname)
   {
	  var itemname=itemname;
	  
	  //alert(itemname);
	   
	   $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_chkitemname.php',
						data: {'itemname':itemname},
						success: function(data){
							///alert(data);
							$('#dis_table').html(data);
							window.location.reload();
						
					},
		});
		 
	   
   } 
	

	</script>
    <script>
   
  function check_existid()
   {
	   var val1=$('#trycatid').val();
	   var val2=$('#item_id').val();
	   var id=val1+val2;
	 
	
	   $.ajax({
        type:'post',
        url:'ajax/checkItemId.php',// put your real file name 
        data:{'id': id},
        success:function(data){
			//alert(data);
			if(data == 5)
			{
				alert("Item Id  Already Exist");
				$("#item_id").val('');
		        $("#item_id").focus();
			}
			else
			{
				//alert("otExist");
				$("#item_nm").focus();
			}
		}
        });
	   
	   
   }
   
   
   
   function pointed()
   
   {
	  $("#item_nm").focus(); 
	   
   }
   </script>
   
    <script>
	function check(id)
	{
		
	alert('hi');
	var item_id = $('#item_id').val();
	alert(id);	
	alert(item_id);
	}
	
	</script>
    
    
    
    <!--check Item Id is Exist Or Not-->
 
    <script>
   $('#reorder').keypress(function (e) {
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
   $('#item_id').keypress(function (e) {
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


 <!--<script>
function chkitemname(itemname)
{
	alert(itemname);
	
	$.ajax({ 
						type: "POST",
						url: 'ajax/ajax_chkitemname.php',
						data: {'itemname':itemname},
						success: function(data){
							alert(data);

					},
		});
}
</script>--> 
  
   <script>
  $(document).ready(function(){
    $("#form1").validate({
		  ignore: ":hidden",
  rules: {
	
	  
	  category_nm: {required: true},
	  item_nm: {required:true},
	  unit_measure: {required:true},
	  reorder: {required:true},
	  item_id:{required:true},
	 
    },
  messages: {
	 // Geog_Id: {required: 'Select Geog ID'},
	  category_nm: {required: 'Please Select Category'},
	  item_nm: {required: 'Please Enter Item Name'},
	  unit_measure: {required: 'Please Enter Unit Of Measure'},
	  reorder: {required: 'Please Enter Reorder Level'},
	  item_id: {required: 'Please Enter Item Id'},
  }
});
  });
  </script>
  
  <script>

$("#unit_measure").on("keypress", function(event) {
 var englishAlphabetAndWhiteSpace = /[A-Za-z ]/g;
   var key = String.fromCharCode(event.which);
    
    //alert(event.keyCode);
    if (event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || englishAlphabetAndWhiteSpace.test(key)) {
        return true;
    }
    return false;
});

$('#unit_measure').on("paste",function(e)
{
    e.preventDefault();
});
</script>

<script>

$("#item_nm").on("keypress", function(event) {
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

function msghh(id)
	{
		if(id=='')
		{
		alert('Please Enter the Item Id');
		$('#item_id').focus();}
		else
		{
			
		}
		
	}
function msghh(id)
	{
		if(id=='')
		{
			alert('Please Enter the Item Name');
		$('#item_nm').focus();}
		else
		{
			
		}
		
	}
	function msghh(id)
	{
		if(id=='')
		{
			alert('Please Enter the Unit of Measure');
		$('#unit_measure').focus();}
		else
		{
			
		}
		
	}
function msghh(id)
	{
		if(id=='')
		{
			alert('Please Enter the Reorder Level Value');
		$('#reorder').focus();}
		else
		{
			
		}
		
	}
</script>
<script>
function trycates(id)
{
	
	 $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_Trynewcat.php',
						data: {},
						success: function(data){							
							 $('#discat').html(data);
							 dis_categoryId(id);
							}
						});
	
}

</script>

<script>
function resetval()
{
	
	$('#trycatid').val('');
	$('#item_id').val('');
	$('#reorder').val('');
	$('#item_id').val('');
	$('#category_nm').val('');
	$('#category_id').val('');
	$('#item_nm').val('');	
	$('#unit_measure').val('');

	
	 $.ajax({ 
						type: "POST",
						url: 'ajax/ajax_resetnewcat.php',
						data: {},
						success: function(data){							
							 $('#discat').html(data);
							
							}
						});
	


	
	
}

</script>


</body>

</html>
