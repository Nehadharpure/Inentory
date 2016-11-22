<?php

 include("../connection.php");
 
$day1 = substr($_POST['date1'],0,2);  # extract 2 char starting at position 0.
 $month1 = substr($_POST['date1'],3,2);  # extract 2 char starting at position 3.
 $year1   = substr($_POST['date1'],6,4);  
 $startdate = $year1.'-'.$month1.'-'.$day1;

$day2 = substr($_POST['date2'],0,2);  # extract 2 char starting at position 0.
 $month2 = substr($_POST['date2'],3,2);  # extract 2 char starting at position 3.
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
<a href="ajax/StockIn_excel.php?report=Stock_In_Report.php&startDate=<?php echo $startdate; ?>&endDate=<?php echo $enddate ?>"  class="btn btn-success btn-sm" style="margin-left: 863px;float:right;">
          <span class="glyphicon glyphicon-file">Export Excel</span>
        </a>


<!--<a href="../mpdf60/examples/stockIn_pdf.php?report=Stock_In_Report.php&startDate=<?php echo $startdate; ?>&endDate=<?php echo $enddate ?>" target="_blank" class="btn btn-success btn-sm" style="margin-left: 863px;">
          <span class="glyphicon glyphicon-file">Export PDF</span>
        </a>
             -->       <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
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
                                 <tbody>
                                   
                                      <?php $stinreport_details = stock_in_report($startdate,$enddate);
									  $i=1;
									   while($stinreport = $stinreport_details->fetch()){
                                       ?>
                                         
                                       <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $stinreport['Date']; ?> </td>
                                            <td><?php echo $stinreport['Transaction_Id']; ?></td>
                                          <?php if($stinreport['Supplier_Id']!=''){?> 
           <td><?php $spname=getspname3($stinreport['Supplier_Id']);$spnames=$spname->fetch(); echo $spnames['Supplier']; ?></td>
                                            <?php } else{?> <td><?php echo $stinreport['Supplier_Id']; ?></td><?php } ?>
                                       <?php if($stinreport['Challan_Date']!='0000-00-00'){?>
                                       <td>
									  <?php echo $stinreport['Challan_Date']; ?></td><?php } else {?> <td></td><?php } ?>
                                            <td><?php echo $stinreport['Doc_Reference_No']; ?></td>
                                            <?php if($stinreport['Geog_Id']!=''){?> 
                <td><?php $getloc=getlocations($stinreport['Geog_Id']); $getlocation=$getloc->fetch(); echo $getlocation['Location']; ?></td><?php } else { ?>
                                            <td><?php echo $stinreport['Geog_Id']; ?></td><?php } ?>
                                           <td><?php  echo $stinreport['Item_Name']; ?></td>
                                            <td><?php echo $stinreport['Unit_Of_Measure']; ?></td>
                                            <td><?php echo $stinreport['Quantity']; ?></td>
                                            <td><?php echo $stinreport['Price']; ?></td>
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