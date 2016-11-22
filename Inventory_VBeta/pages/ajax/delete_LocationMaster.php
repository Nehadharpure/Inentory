<?php

  include('../connection.php');
   
 
  $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  
  $localtime=date('d/m/Y').' '.date('H:i:s');
  
     deleteLocation($_POST['loc_id']);  ?>
	 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                            <center><a href="#" data-toggle="modal" data-target="#deleterow1" onClick="get_update('<?php echo $showgeog_details['Geog_Id'];?>')"><span id="edit1" name="edit1" class="fa fa-edit" title="Edit"   style="font-size:24px;"></span></a><a href="#"  data-toggle="modal" data-target="#deleterow1" onClick="del_msg('<?php echo $showgeog_details['Geog_Id']?>');"><span class="fa fa-times-circle" style="font-size:24px;" title="Delete"></span></a></center></td>
                                           </tr>
                                       <?php $i++;} ?>
                                     </tbody>
                                </table>