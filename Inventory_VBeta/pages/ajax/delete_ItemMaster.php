<?php

  include('../connection.php');
   
 
  $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  
  $localtime=date('d/m/Y').' '.date('H:i:s');
  
     deleteItemMaster($_POST['id']);  ?>
	 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead  style="background-color:#23527c; color:#FFF;">
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Category</th>
                                            <th>Item ID</th>
                                            <th>Item Name</th>
                                            <th>Unit Of Measure</th>
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