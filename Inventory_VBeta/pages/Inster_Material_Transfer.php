<?php
   include('connection.php');
  
 
  $timezone = "Asia/Calcutta";
  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
  $localtime=date('Y-m-d').' '.date('H:i:s');
  $sysdate = $_POST['datepicker'];
 
 
  $day    = substr($sysdate,0,2);  # extract 2 char starting at position 0.
  $month  = substr($sysdate,3,2);  # extract 2 char starting at position 3.
  $year   = substr($sysdate,6,4);  
  $transdate = $year.'-'.$month.'-'.$day;
 
//echo $transdate;


if (isset($_POST['submit']))
  {
	 $arraycount =$_POST['element1'];
	  //echo $arraycount;
      $result = rtrim($arraycount,',');
	  $cntNov = explode(",",$result);
	  foreach($cntNov as $nov)
		 {  
		   $tran_no = $_POST['transaction_no'];
		   $Issue_By = $_POST['Issue_By'];
		   $Issue_To = $_POST['Issue_To'];
		   $itemid = $_POST['itemidnew'.$nov];
                   $item_nm = $_POST['itemnamenew'.$nov];
		   $unit_measure = $_POST['unitnew_measure'.$nov];
	       $avlqty = $_POST['avlqtynew'.$nov];
		   $qty = $_POST['qty'.$nov];
	       $remqty_InIssueByGeog =$avlqty - $qty;
		 
	      /* echo '<pre>';
           print_r($tran_no);
           echo '<pre>';
		  */
		  $getAvl_Interdep = getAvlQtyOfIssueToGeog($Issue_To,$itemid);
          $showAvl_Interdep = $getAvl_Interdep->fetch();
          $avlqty_interdep = $showAvl_Interdep['Availabe_Qty'];
		  $remqty_InIssueToGeog = $avlqty_interdep + $qty;
		
		  Insert_MaterialTransfer($transdate,$tran_no,$Issue_By,$Issue_To,$itemid,$unit_measure,$qty);
		  updateAvlQty_IssueByGeog($Issue_By,$itemid,$remqty_InIssueByGeog);
		  updateAvlQty_IssuToGeog($Issue_To,$itemid,$item_nm,$unit_measure,$remqty_InIssueToGeog,$avlqty_interdep);
		  
		
        }
	  echo "<script>window.location= 'material_transfer.php';</script>";
	
  }
  

 ?>
      