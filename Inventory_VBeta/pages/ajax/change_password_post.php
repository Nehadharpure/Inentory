<?php  
include('../connection.php');
 session_start(); 
if(isset($_SESSION['username'])){
	updatepass($_POST['newpassword'], $_POST['uid']);
	echo '<script>alert("Your Password changed successfully");</script>';
	echo "<script>window.location='../logout.php';</script>";
}
else
{
	echo "<script>window.location='../index.php';</script>";
} ?>
