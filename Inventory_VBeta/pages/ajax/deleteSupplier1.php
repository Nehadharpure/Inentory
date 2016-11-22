<?php

  include('../connection.php');
   echo $_POST['sup_id'];
 
  $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  
  $localtime=date('d/m/Y').' '.date('H:i:s');
  
     deleteSupplier($_POST['sup_id']);  ?>
	 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead style="background-color:#23527c; color:#FFF;">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Supplier ID</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody id="tbId">

                                      <?php
									   $getsupplier_details = getSupplier_details();
									  $i=1;
									   while($showsupplier_details = $getsupplier_details->fetch()){
						<tr class="odd gradeX">						 ?>
                                         
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $showsupplier_details['Supplier_Id'];?> </td>
                                            <td><?php echo $showsupplier_details['Supplier'];?></td>
                                            <td><?php echo $showsupplier_details['Address'];?></td>
                                            <td><?php echo $showsupplier_details['Contact_No'];?></td>
                                            <td>
                                            <center><a href="#" data-toggle="modal" data-target="#deleterow1" onClick="get_update('<?php echo $showsupplier_details['Supplier_Id'];?>')"><span id="edit1" name="edit1" class="fa fa-edit" title="Edit"   style="font-size:24px;"></span></a><a href="#"  data-toggle="modal" data-target="#deleterow1" onClick="del_msg('<?php echo $showsupplier_details['Supplier_Id'];?>');"><span class="fa fa-times-circle" style="font-size:24px;" title="Delete"></span></a></center></td>
                                           </tr>
                                       <?php $i++;} ?>
                                     </tbody>
                                </table>