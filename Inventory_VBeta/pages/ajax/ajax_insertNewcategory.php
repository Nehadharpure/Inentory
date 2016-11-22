<?php
include("../connection.php");
//print_r($_POST);


$existCategory = GetExistCat($_POST['Category_name']);
$check=$existCategory->rowCount(); 

 if($check!=0 )
  { 
     $abc=5;
  echo $abc;
  
  }
 
 else
 {

 InsertNewcategory($_POST['Category_name']);
$getnewcatname=getcatids($_POST['Category_name']);
$getnewid=$getnewcatname->fetch();
echo $getnewid['Item_Category_Id'];
}


?>
 

