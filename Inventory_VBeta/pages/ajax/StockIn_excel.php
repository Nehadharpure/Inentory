
<?php 
include('../../pages/connection.php');

$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];
$date = date('d-m-Y');

header( "Content-Type: application/vnd.ms-excel" );
 header( "Content-disposition: attachment; filename=Material Received Details.xls" );
 
 // print your data here. note the following:
 // - cells/columns are separated by tabs ("\t")
 // - rows are separated by newlines ("\n")
   echo 'Material Received Details'.    "\n";
  echo 'Date: '.$date."\n";
  echo 'Sr No'. "\t" . 'Date ' . "\t" . 'Transaction Id ' . "\t". 'Supplier'. "\t" . 'Challan Date ' . "\t". 'Doc.Ref.No.'."\t". 'Issued By ' . "\t".   'Material ' . "\t". 'U.O.M'. "\t" . 'Qty ' . "\t". 'Price'."\n";
  $stinreport_details = stock_in_report($startDate,$endDate);
	 $i=1;
	 while($stinreport = $stinreport_details->fetch()){

        $tran_date =$stinreport['Date'];
        $tran_date = date("d-m-Y", strtotime($tran_date));

	 echo $i++ . "\t" . $tran_date. "\t" . $stinreport['Transaction_Id'] . "\t";	
	 $spname = getspname3($stinreport['Supplier_Id']);
		while( $spnames=$spname->fetch()){	
		 echo $spnames['Supplier'];}

	$tran_date1 =$stinreport['Challan_Date'];
        $tran_datee = date("d-m-Y",strtotime($tran_date1));

 echo "\t" .$tran_datee . "\t" . $stinreport['Doc_Reference_No']."\t";
    $getloc=getlocations($stinreport['Geog_Id']); 
	while($getlocation=$getloc->fetch()){
	echo $getlocation['Location']; }
                                            
 
 echo "\t". $stinreport['Item_Name']."\t".$stinreport['Unit_Of_Measure']."\t".$stinreport['Quantity']."\t".$stinreport['Price']."\n";
								   
 }
  
 ?>