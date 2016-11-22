
<?php 
include('../../pages/connection.php');
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];

$date = date('d-m-Y');

header( "Content-Type: application/vnd.ms-excel" );
 header( "Content-disposition: attachment; filename=Material_Issued_details.xls" );
 
 // print your data here. note the following:
 // - cells/columns are separated by tabs ("\t")
 // - rows are separated by newlines ("\n")
  echo 'Material Issued Details'.    "\n";
  echo 'Date: '.$date."\n";
 echo 'Sr No'. "\t" . 'Date ' . "\t" . 'Trans.No.' . "\t". 'Issued By'. "\t" . 'Received By' . "\t". 'Material'."\t". 'U.O.M'. "\t" . 'Issued Qty ' . "\t". 'Price'."\n";
                          
            $stoutreport_details = stock_out_report($startDate,$endDate);
			$i=1;
		    while($stoutreport = $stoutreport_details->fetch()){
$tran_date =$stoutreport['Date'];

$tran_date = date("d-m-Y", strtotime($tran_date));

			 echo $i++ . "\t" . $tran_date. "\t" . $stoutreport['Transaction_Id'] . "\t". $stoutreport['Stock_Location']."\t";	
	     $getloc = getlocations($stoutreport['Receiving_Location']); 
		 $getlocation = $getloc->fetch();
		 echo $getlocation['Location']. "\t";
		 echo $stoutreport['Item_Name'] ."\t".$stoutreport['Unit_Of_Measure']."\t". $stoutreport['Quantity']."\t".$stoutreport['Price']."\n";
								   
	 }			  
              
  
 ?>