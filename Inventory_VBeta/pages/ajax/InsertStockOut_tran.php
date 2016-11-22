<?php
   include('../connection.php');
 
  $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  $localdate = date('Y-m-d');
  $localtime = date('H:i:s');
  $sysdate = $_POST['datepicker'];
 
 
  $day = substr($sysdate,0,2);  # extract 2 char starting at position 0.
 $month = substr($sysdate,3,2);  # extract 2 char starting at position 3.
 $year   = substr($sysdate,6,4);  
 $transdate = $year.'-'.$month.'-'.$day;
 
// echo $transdate;
//echo $sysdate ;

 //echo $_POST['avlqty'];

if (isset($_POST['submit']))
  {
	 $arraycount =$_POST['element1'];
	  //echo $arraycount;
      $result = rtrim($arraycount,',');
	  $cntNov = explode(",",$result);
	  foreach($cntNov as $nov)
		 {  
		   $tran_no = $_POST['transaction_no'];
		   $geog_Id = $_POST['geog_id'];
		   $Inhouse_Id = $_POST['Inhouse_nm'];
		   $itemid = $_POST['itemidnew'.$nov];
                    $item_nm = $_POST['itemnamenew'.$nov];
	            $avlqty = $_POST['avlqtynew'.$nov];
		    $qty = $_POST['qty'.$nov];
	           $price = $_POST['pricenew'.$nov];
		   $unit_measure = $_POST['unitnew_measure'.$nov];
		   $rem_qty =$avlqty - $qty;
		 
	       /*echo '<pre>';
           print_r($remqty_interdep);
           echo '<pre>';
		   */
		  $getAvl_Interdep = AvtQty_Interdepartment($Inhouse_Id,$itemid);
          $showAvl_Interdep = $getAvl_Interdep->fetch();
          $avlqty_interdep = $showAvl_Interdep['Availabe_Qty'];
		  $remqty_interdep = $avlqty_interdep + $qty;
  

		  Insert_StockOutTransaction($transdate,$tran_no,$geog_Id,$Inhouse_Id,$itemid,$unit_measure,$qty,$price);
		  updateAvlQty($itemid,$rem_qty);
		  Insert_InterdeparmentStock($Inhouse_Id,$itemid,$item_nm,$unit_measure,$remqty_interdep,$avlqty_interdep);
		
		 
        }
	  echo "<script>window.location= '../stockOut_transaction.php';</script>";
	
  }
  

 ?>
      