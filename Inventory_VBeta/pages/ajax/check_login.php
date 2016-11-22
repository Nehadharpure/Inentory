
<?php include("../connection.php"); 
//echo $_POST['username'];
//echo $_POST['password'];

?> 

<?php
   
     $companyDetails = getCompanyDetails($_POST['username'], $_POST['password']);
     while($Showcat= $companyDetails->fetch()) {
     $userid    = $Showcat['Rec_id'];
	 $username  = $Showcat['username'];
	 $Geog_Id   = $Showcat['Geog_Id'];
	   // echo  $Showcat;
		//die();
	 
 }
$r = $companyDetails->rowCount(); 
 //echo $r;
  if($r != 0)
  {
  
     session_start();
     $_SESSION['username'] = $_POST['username'];
     $_SESSION['password'] = $_POST['password'];
     $_SESSION['User_Id']=$userid;
     $_SESSION['Geog_Id']=$Geog_Id;
	
    echo "<script>window.location= '../index.php';</script>";
    UpdateCompanyDetails($_POST['username'], $_POST['password']);
 }
	 

 else
 {
    echo "<script>alert('Invalid Username or Password');</script>";
    echo "<script>window.location= '../login.php';</script>";
 }
?>
 