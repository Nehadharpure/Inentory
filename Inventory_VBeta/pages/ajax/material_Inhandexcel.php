
<?php 
include('../../pages/connection.php');


$date = date('d-m-Y');

header( "Content-Type: application/vnd.ms-excel" );
 header( "Content-disposition: attachment; filename=Material In-Hand Details.xls" );
 
 // print your data here. note the following:
 // - cells/columns are separated by tabs ("\t")
 // - rows are separated by newlines ("\n")
  echo 'Material In-Hand'.    "\n";
  echo 'Date: '.$date."\n";
  echo 'Sr No'. "\t" . 'Material ' . "\t" . 'S.I.H ' . "\n";
   $getitemdetils = getitemnamesed();
	
	 $i=1;
			  while($itemavail = $getitemdetils->fetch())
			  {
				  echo $i++ . "\t" . $itemavail['Item_Name']. "\t" . $itemavail['Available_Qty'] . "\n";			  
									  } 
              
  
 ?>