<?php
   include('../connection.php');
 
  $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  $localtime=date('Y-m-d').' '.date('H:i:s');
  $sysdate = $_POST['datepicker'];
  $sysdate1 = $_POST['datepicker1'];
 
 $day  = substr($sysdate,0,2);  # extract 2 char starting at position 0.
 $month = substr($sysdate,3,2);  # extract 2 char starting at position 3.
 $year   = substr($sysdate,6,4);  
 $localdate = $year.'-'.$month.'-'.$day;
 
  $day1  = substr($sysdate1,0,2);  # extract 2 char starting at position 0.
 $month1 = substr($sysdate1,3,2);  # extract 2 char starting at position 3.
 $year1   = substr($sysdate1,6,4);  
 $transdate = $year1.'-'.$month1.'-'.$day1;	
 
 
      $arraycount =$_POST['element1'];
	  //echo $arraycount;
      $result = rtrim($arraycount,',');
	  $cntNov = explode(",",$result);
	  foreach($cntNov as $nov)
		 {  
		  $tran_no = $_POST['transaction_no'];
		  $geog_Id = $_POST['geog_id'];
		  $supplier_Id = $_POST['supplier_nm'];
		  $docref_no = $_POST['docref_no'];
		  $Inhouse_Id = $_POST['Inhouse_nm'];
		
		   $itemid = $_POST['itemidnew'.$nov];
		   
		   $avlqty = $_POST['avlqtynew'.$nov];
	   // $item_nm = $_POST['item_nm'.$nov];
		   $qty = $_POST['qty'.$nov];
	       $price = $_POST['pricenew'.$nov];
		   $unit_measure = $_POST['unitnew_measure'.$nov];
		   $rem_qty = $avlqty + $qty;
		  
		/*  echo '<pre>';
           print_r();
           echo '<pre>';*/
		   
		
                Insert_StockInTransaction($localdate,$tran_no,$geog_Id,$supplier_Id,$transdate,$docref_no,$Inhouse_Id,$itemid,$unit_measure,$qty,$price);
		  updateAvlQty($itemid,$rem_qty);
                // echo "<script>window.location= '../stockIn_transaction.php';</script>";
		  


}
	   echo "<script>window.location= '../stockIn_transaction.php';</script>";
	
 
  

 ?>
      