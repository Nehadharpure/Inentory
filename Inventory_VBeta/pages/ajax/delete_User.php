<?php

  include('../connection.php');

 $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  
  $localtime=date('d/m/Y').' '.date('H:i:s');
  
     deleteUser($_POST['id']);  ?>
	 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                    <tbody id="tbId">
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
                                            <center><a href="#"  onClick="get_update('<?php echo $showtUser_details['Rec_id'];?>')"><span id="edit1" name="edit1" class="fa fa-edit" title="Edit"   style="font-size:24px;"></span></a><a href="#"  data-toggle="modal" data-target="#deleterow1" onClick="del_msg('<?php echo $showtUser_details['Rec_id'];?>');"><span class="fa fa-times-circle" style="font-size:24px;" title="Delete"></span></a></center></td>
                                           </tr>
                                       <?php $i++;} ?>
                                         </tbody>
                                    
                                </table>