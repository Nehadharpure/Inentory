
<?php 
include('../../pages/connection.php');


$date = date('d-m-Y');

header( "Content-Type: application/vnd.ms-excel" );
 header( "Content-disposition: attachment; filename=Reorder Level Details.xls" );
 
 // print your data here. note the following:
 // - cells/columns are separated by tabs ("\t")
 // - rows are separated by newlines ("\n")
  echo 'Reorder Level Details'.    "\n";
  echo 'Date: '.$date."\n";
  echo 'Sr No'. "\t" . 'Material ' . "\t" . 'S.I.H ' . "\t". 'Reorder Level'. "\n";
  $getreorder = reorderreport();
	 $i=1;
	 while($reorder = $getreorder->fetch()){
				  echo $i++ . "\t" . $reorder['Item_Name']. "\t" . $reorder['Available_Qty'] . "\t". $reorder['Reorder_level']. "\n";			  
									  } 
              
  
 ?>