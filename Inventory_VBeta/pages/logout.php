<?php include('connection.php'); 
 
   session_start(); 
   $uid12 = $_SESSION['username'];

	session_unset();
	session_destroy();
	echo "<script>window.location='login.php';</script>";
	update_loginstatus1($uid12); 
	
   

?>