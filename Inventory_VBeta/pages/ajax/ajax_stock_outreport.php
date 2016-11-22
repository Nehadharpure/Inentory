<?php
 include("../connection.php"); 
$day1= substr($_POST['date1'],0,2);  # extract 2 char starting at position 0.
 $month1 = substr($_POST['date1'],3,2);  # extract 2 char starting at position 3.
 $year1   = substr($_POST['date1'],6,4);  
 $startdate = $year1.'-'.$month1.'-'.$day1;

$day2  = substr($_POST['date2'],0,2);  # extract 2 char starting at position 0.
 $month2  = substr($_POST['date2'],3,2);  # extract 2 char starting at position 3.
 $year2   = substr($_POST['date2'],6,4);  
 $enddate = $year2.'-'.$month2.'-'.$day2;
 
 if($_POST['date1']=='')
 {
	 
	 $startdate=$enddate;
 }
  if($_POST['date2']=='')
 {
	 
	 $enddate=$startdate;
 }
 
?>

<a href="ajax/StockOut_excel.php?report=Stock_Out_Report.php&startDate=<?php echo $startdate; ?>&endDate=<?php echo $enddate ?>"  class="btn btn-success btn-sm" style="margin-left: 863px;float:right;">
          <span class="glyphicon glyphicon-file">Export Excel</span>
        </a>

<!-- <a href="../mpdf60/examples/stockOut_pdf.php?report=Stock_Out_Report.php&startDate=<?php echo $startdate; ?>&endDate=<?php echo $enddate ?>" target="_blank" class="btn btn-success btn-sm" style="margin-left: 863px;">
          <span class="glyphicon glyphicon-file">Export PDF</span>
        </a>-->

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
                                    <thead style="background-color:#23527c; color:#FFF;">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Date</th>
                                            <th>Transaction Id</th>
                                            <th>Issued By</th>
                                            <th>Received By</th>
                                            <th>Material</th>
                                             <th>U.O.M</th>
                                              <th>Qty</th> 
											 <th>Price</th>
                                               
                                        </tr>
                                    </thead>
                                   <tbody>
                                      <?php $stoutreport_details = stock_out_report($startdate,$enddate);
									  $i=1;
									   while($stoutreport = $stoutreport_details->fetch()){
										   
                                       ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $stoutreport['Date']; ?> </td>
                                            <td><?php echo $stoutreport['Transaction_Id']; ?></td>
                                            <td><?php echo $stoutreport['Stock_Location']; ?></td>
                        <td><?php $getloc=getlocations($stoutreport['Receiving_Location']); $getlocation=$getloc->fetch(); echo $getlocation['Location']; ?></td>
                                            <td><?php  echo $stoutreport['Item_Name']; ?></td>
                                            <td><?php echo $stoutreport['Unit_Of_Measure']; ?></td>
                                            <td><?php echo $stoutreport['Quantity']; ?></td>
                                            <td><?php echo $stoutreport['Price']; ?></td>
                                            </tr>
                                           
                                       <?php $i++;} ?>
                                     </tbody>
                                </table>
                                
                                
                                
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	</script>