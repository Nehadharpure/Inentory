<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//error_reporting(0);
$servername = "10.140.0.2";
$username = "root";
$password = "root123";
$dbname = "inventory";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	


///////////////login//////////////
function getCompanyDetails($username,$password)
{
	global $conn;
	$sql = "select * from company_profile where username='$username' and passwordw='$password'";
	$result = $conn->query($sql);
	return $result;
}

function UpdateCompanyDetails($username,$password)
{
	global $conn;
	$sql = "Update company_profile  set status ='1' where username='$username' and passwordw='$password'";
	$result = $conn->query($sql);
	return $result;
}

function  update_loginstatus1($uid12)
{
	
  global $conn;
  $sql = "update company_profile set status ='0' where  username='$uid12'";
   $result = $conn->query($sql);
  // return $result;
 
}	

function change_password($user_id)
{
   global $conn;
   $sql = "select * from company_profile where Rec_id ='$user_id'";
   $result = $conn->query($sql);
   return $result;
}


function updatepass($newpass,$uid)
{
	
  global $conn;
  $sql = "update company_profile set password ='$newpass',passwordw = '$newpass' where  Rec_id='$uid'";
   $result = $conn->query($sql);
  // return $result;
 
}	



/////  stockIn Transaction form///////////


function getsupplier_detail()
{
	global $conn;
	$sql = "select * from dim_supplier";
	$result = $conn->query($sql);
	return $result;
}
function getlocation_detail()
{
	global $conn;
	$sql = "select * from dim_location_geog where Geog_Id !='G1' ";
	$result = $conn->query($sql);
	return $result;
}
function getLocationId()
{
	global $conn;
	$sql = "select * from dim_location_geog where Store_Name='store1'";
	$result = $conn->query($sql);
	return $result;
	
}
function getTransactionNo()
{
	global $conn;
	$sql = "select max(Transaction_Id)+1 as Transaction_Id from stock_in_transaction";
	$result = $conn->query($sql);
	return $result;
	
}
function getItemId()
{
	global $conn;
	$sql = "select * from dim_item";
	$result = $conn->query($sql);
	return $result;
	
}
function getStockIn_Itemnm($item_Id)
{
	global $conn;
	$sql = "select * from dim_item where Item_Id = '$item_Id'";
	$result = $conn->query($sql);
	return $result;
	
}


function Insert_StockInTransaction($localdate,$Transaction_no,$location_id,$Supplier_Id,$Challan_Date,$Doc_Reference_No,$Inhouse_Id,$item_id,$unit_measure,$qty,$price)
{
	
    global $conn;
   if($price==null){
    $sql = "insert into stock_in_transaction set 
                Date ='$localdate',
                Transaction_Id ='$Transaction_no',
				Geog_Id ='$location_id',
				Supplier_Id ='$Supplier_Id',
				Challan_Date = '$Challan_Date',
				Doc_Reference_No = '$Doc_Reference_No',
				Inhouse_Id = '$Inhouse_Id',
				Item_Id ='$item_id',
				Unit_Of_Measure ='$unit_measure',
				Quantity = '$qty',
				Price = '0'
				";
			    }
else
   { $sql = "insert into stock_in_transaction set 
                Date ='$localdate',
                Transaction_Id ='$Transaction_no',
				Geog_Id ='$location_id',
				Supplier_Id ='$Supplier_Id',
				Challan_Date = '$Challan_Date',
				Doc_Reference_No = '$Doc_Reference_No',
				Inhouse_Id = '$Inhouse_Id',
				Item_Id ='$item_id',
				Unit_Of_Measure ='$unit_measure',
				Quantity = '$qty',
				Price = '$price'
				";
			   }


       $result = $conn->query($sql);
      
}

function getallLocationId()
{
	global $conn;
	$sql = "select Geog_Id from dim_location_geog";
	$result = $conn->query($sql);
	return $result;
	
	
}

//*****************************stock Out Transaction************************************/
function getAvlqty($item_id)
{
	global $conn;
	$sql = "select dim_item.Available_Qty from stock_in_transaction,dim_item
where stock_in_transaction.Item_Id = dim_item.Item_Id and stock_in_transaction.Item_Id ='$item_id'";

	$result = $conn->query($sql);
	return $result;

}
function getStockOutTransactionNo()
{
	global $conn;
	$sql = "select max(Transaction_Id)+1 as Transaction_Id from stock_out_transaction";
	$result = $conn->query($sql);
	return $result;
	
}
function getlocationout_detail()
{
	global $conn;
	$sql = "select * from dim_location_geog where Geog_Id !='G1'";
	$result = $conn->query($sql);
	return $result;
}
function Insert_StockOutTransaction($localdate,$Transaction_no,$location_id,$Inhouse_Id,$item_id,$unit_measure,$qty,$price)
{
	
    global $conn;
if($price==null)
{
    $sql = "insert into stock_out_transaction set 
                Date ='$localdate',
                Transaction_Id ='$Transaction_no',
				Geog_Id ='$location_id',
				Receiving_Geog_Id ='$Inhouse_Id',
				Item_Id ='$item_id',
				Unit_Of_Measure ='$unit_measure',
				Quantity = '$qty',
				Price = '0'
				";
}
else
{
$sql = "insert into stock_out_transaction set 
                Date ='$localdate',
                Transaction_Id ='$Transaction_no',
				Geog_Id ='$location_id',
				Receiving_Geog_Id ='$Inhouse_Id',
				Item_Id ='$item_id',
				Unit_Of_Measure ='$unit_measure',
				Quantity = '$qty',
				Price = '$price'
				";


}
			    $result = $conn->query($sql);
	
}

//////Insert into dim_inter_dept_qty for maintaining inter department stock
function Insert_InterdeparmentStock($Inhouse_Id,$item_id,$item_nm,$unit_measure,$qty,$avlqty_interdep)
{
	
    global $conn;
if($avlqty_interdep == null)
{
    $sql = "insert into dim_inter_dept_qty set 
             	Receiving_Geog_Id ='$Inhouse_Id',
			    Item_Id ='$item_id',
                             Item_Name ='$item_nm',
				Unit_Of_Measure ='$unit_measure',
				Availabe_Qty = '$qty'
			  ";
			
}
else
{
	 $sql = "update dim_inter_dept_qty set
	         Availabe_Qty= '$qty'
	         where dim_inter_dept_qty.Receiving_Geog_Id ='$Inhouse_Id'
			 and Item_Id ='$item_id'
			  ";
			
	
}
 $result = $conn->query($sql);
}

			
function AvtQty_Interdepartment($geog_Id,$itemid)
	{
		global $conn;
		$sql = "select Availabe_Qty from dim_inter_dept_qty where Receiving_Geog_Id ='$geog_Id'  and Item_Id ='$itemid'";
		$result = $conn->query($sql);
		return $result;
	}

////// end inter dep qty //////
function updateAvlQty($item_id,$rem_qty)
{
	global $conn;
	$sql = "update  dim_item set Available_Qty ='$rem_qty' where Item_Id = '$item_id'";
	$result = $conn->query($sql);
	return $result;
}
function getStockItemId()
{
 global $conn;
 $sql = "select  Item_Name,Item_Id from dim_item
 where  dim_item.Available_Qty>0
 ";
 $result = $conn->query($sql);
 return $result;
	
}

///Comman For Location Master and Syupplier Master

/*function Get_Country()
{
	global $conn;
	$sql = "select * from country";
	$result = $conn->query($sql);
	return $result;
}

	function Get_State($id)
{
	global $conn;
	$sql = "select state.* from state where state.Country_Id='$id'";
	$result = $conn->query($sql);
	return $result;
}

function Get_City($id)
{
	global $conn;
	$sql = "select * from city where city.State_Id='$id' ";
	$result = $conn->query($sql);
	return $result;
}
*/

function getCountry()
    {
		global $conn;	
	 $sql = "select * from country";		
	  $result = $conn->query($sql);
	  return $result;
    }	
		
function getState($country)
    {
		global $conn;	
	 $sql = "select * from state where Country_Id = '$country'";		
	  $result = $conn->query($sql);
	  return $result;
    }		

function getcity($state)
    {
		global $conn;	
	 $sql = "select * from city where State_Id = '$state'";		
	  $result = $conn->query($sql);
	  return $result;
    }

function getPerticularState($stateId)
    {
		global $conn;	
	 $sql = "select * from state where State_Id = '$stateId'";		
	  $result = $conn->query($sql);
	  return $result;
    }	

function getPerticularCity($cityId)
    {
		global $conn;	
	 $sql = "select * from city where City_Id = '$cityId'";		
	  $result = $conn->query($sql);
	  return $result;
    }

//Location Master
	
function InsertLocationMaster($location_id,$location_nm,$address,$country_id,$state_id,$city_id,$contact_no,$pcontact_no)
{
	global $conn;
    $sql = "insert into dim_location_geog set 
                
				Geog_Id ='$location_id',
				Location ='$location_nm',
				Address ='$address',
				Country_Id ='$country_id',
				State_Id = '$state_id',
				City_Id = '$city_id',
				Contact_No ='$contact_no',
				Contact_Person ='$pcontact_no'
				";
			    $result = $conn->query($sql);
	
	
}
function getgeog_details()
{
	global $conn;	
	 $sql = "select * from dim_location_geog order by Sr_No desc";		
	  $result = $conn->query($sql);
	  return $result;
	
	
	
}

function locationUpdate_details($id)
{
	global $conn;
	$sql = "select * from dim_location_geog
 where dim_location_geog.Geog_Id='$id'  order by Geog_Id desc"; 
 
	$result = $conn->query($sql);
	return $result;
}
function locationUpdate_details1($id)
{
	global $conn;
	$sql = "select  dim_location_geog.*, country.Country_Name,state.State_Name,city.City_Name from dim_location_geog,country,state,city
 where country.Country_Id=dim_location_geog.Country_Id
and state.State_Id=dim_location_geog.State_Id 
 and city.City_Id=dim_location_geog.City_Id
 and dim_location_geog.Geog_Id='$id'"; 
 
	$result = $conn->query($sql);
	return $result;
}

function updateLocationMaster($location_id,$location_nm,$address,$country_id,$state_id,$city_id,$contact_no,$pcontact_no)
{
	global $conn;
	$sql = "update  dim_location_geog set 
	Geog_Id = '$location_id',
	Location = '$location_nm',
	Address = '$address',
	Country_Id = '$country_id',
	State_Id = '$state_id',
	City_Id = '$city_id',
	Contact_No = '$contact_no',
	Contact_Person = '$pcontact_no' 
	where Geog_Id = '$location_id'
	";
	$result = $conn->query($sql);
	return $result;
}

function deleteLocation($loc_id)
{
     global $conn;	
	 $sql = "delete from dim_location_geog where Geog_Id = '$loc_id'";		
	  $result = $conn->query($sql);
	  return $result;
}
function getLocation_Id($location_id)
{
     global $conn;	
	 $sql = "select Geog_Id from dim_location_geog where Geog_Id ='$location_id'";		
	  $result = $conn->query($sql);
	  return $result;
}
/////////////////////Supplier Master//////////////////////////////

function InsertSupplierMaster($supplier_id,$supplier_nm,$address,$country_id,$state_id,$city_id,$email,$contact_no,$pcontact_no)
{
	global $conn;
    $sql = "insert into dim_supplier set 
                Supplier_Id ='$supplier_id',
				Supplier ='$supplier_nm',
				Address ='$address',
				Country_Id ='$country_id',
				State_Id = '$state_id',
				City_Id = '$city_id',
				Email = '$email',
				Contact_No ='$contact_no',
				Contact_Person ='$pcontact_no'
				";
			    $result = $conn->query($sql);
	
	
}
function getSupplier_details()
{
	   global $conn;	
	   $sql = "select * from dim_supplier order by Sr_No desc";		
	   $result = $conn->query($sql);
	   return $result;
	
	
	
}

function supplierUpdate_details($id)
{
	global $conn;
	$sql = "select  * from dim_supplier
where dim_supplier.Supplier_Id='$id'"; 
 
	$result = $conn->query($sql);
	return $result;
}

function updateSupplierMaster($supplier_id,$supplier_nm,$address,$country_id,$state_id,$city_id,$email,$contact_no,$pcontact_no)
{
	global $conn;
	$sql = "update  dim_supplier set 
             	Supplier_Id ='$supplier_id',
				Supplier ='$supplier_nm',
				Address ='$address',
				Country_Id ='$country_id',
				State_Id = '$state_id',
				City_Id = '$city_id',
				Email = '$email',
				Contact_No ='$contact_no',
				Contact_Person ='$pcontact_no'
			    where  Supplier_Id = '$supplier_id'";
	$result = $conn->query($sql);
	return $result;
}
function deleteSupplier($supplier_id)
{
     global $conn;	
	 $sql = "delete from dim_supplier where  Supplier_Id = '$supplier_id'";		
	  $result = $conn->query($sql);
	  return $result;
}
function getSupplier_Id($sup_id)
{
     global $conn;	
	 $sql = "select Supplier_Id from dim_supplier where Supplier_Id ='$sup_id'";		
	  $result = $conn->query($sql);
	  return $result;
}

////////////////////////Material Master//////////////////////////////////////
function Getcategory()
{
	  global $conn;	
	  $sql = "select * from dim_category";		
	  $result = $conn->query($sql);
	  return $result;
}
function Getcategorytry()
{
	  global $conn;	
	  $sql = "select * from dim_category order by Item_Category_Id desc";		
	  $result = $conn->query($sql);
	  return $result;
}
function getItem_Id($item_id)
{
	  global $conn;	
	  $sql = "select Item_Id from dim_item where Item_Id ='$item_id'";		
	  $result = $conn->query($sql);
	  return $result;
	
}	
function Getunitmeasure()
{
	  global $conn;	
	  $sql = "select * from dim_item";		
	  $result = $conn->query($sql);
	  return $result;
}


function GetMaxItemId($cat_id,$length) 
{
	  global $conn;	
	  $sql = "select max(SUBSTRING(Item_Id,$length))+1 as Max_Item_Id from dim_item where Item_Category_Id='$cat_id'
and Item_Id like '$cat_id%' ";		
	  $result = $conn->query($sql);
	  return $result;
}
function GetMaxItemIdplus($cat_id,$length,$itemid) 
{
	  global $conn;	
	  $sql = "select max(SUBSTRING(Item_Id,$length)) as Max_Item_Id from dim_item where Item_Category_Id='$cat_id'
and Item_Id like '$cat_id%' and Item_Id='$itemid' ";		
	  $result = $conn->query($sql);
	  return $result;
}
function getlength($cat_id) 
{
	  global $conn;	
	  $sql = "select (length($cat_id)+1) as length ";		
	  $result = $conn->query($sql);
	  return $result;
}
function getcatids($catname) 
{
	  global $conn;	
	  $sql = "select Item_Category_Id from dim_category where Item_Category_Name='$catname'";		
	  $result = $conn->query($sql);
	  return $result;
}


function InsertNewcategory($catnew) 
{
	  global $conn;	
	  $sql = "insert into dim_category set Item_Category_Name ='$catnew'";		
	  $result = $conn->query($sql);
	 // return $result;
}
function GetExistCat($cat)
{
	global $conn;	
	  $sql = "select * from dim_category where Item_Category_Name ='$cat' ";		
	  $result = $conn->query($sql);
	  return $result;
}
function GetExistitemname($itemname)
{
	global $conn;	
	  $sql = "select * from dim_item where Item_Name ='$itemname'";		
	  $result = $conn->query($sql);
	  return $result;
}


function InsertMaterialMaster($category_id,$item_id,$item_nm,$unit_measure,$reorder)
{
	global $conn;
    $sql = "insert into dim_item set 
                Item_Category_Id ='$category_id',
				Item_Id ='$item_id',
				Item_Name ='$item_nm',
				Unit_Of_Measure = '$unit_measure',
				Reorder_level = '$reorder'
				";
			    $result = $conn->query($sql);
	
	
}
function getItemMaster_details()
{
	global $conn;	
	  $sql = "select dim_category.*,dim_item.* from dim_item ,dim_category
 where dim_category.Item_Category_Id = dim_item.Item_Category_Id order by Sr_No Desc
";		
	  $result = $conn->query($sql);
	  return $result;
}

function ItemUpdate_details($item_id)
{
	global $conn;	
	  $sql = "select * from dim_item where  Item_Id ='$item_id'";		
	  $result = $conn->query($sql);
	  return $result;
}
function updateItemMaster($category_id,$item_nm,$unit_measure,$reorder,$item_id,$srno)
{
	global $conn;
	$sql = "update  dim_item set 
             	Item_Category_Id ='$category_id',
			    Item_Name ='$item_nm',
				Unit_Of_Measure = '$unit_measure',
				Reorder_level = '$reorder',
			    Item_Id = '$item_id'
				where Sr_No='$srno'";
	$result = $conn->query($sql);
	return $result;
}
function deleteItemMaster($id)
{
      global $conn;	
	  $sql = "delete from dim_item where  Item_Id = '$id'";		
	  $result = $conn->query($sql);
	  return $result;
}
/////////////User Register///////////////
function getusertype()
{
     global $conn;	
	 $sql = "select * from dim_user";		
	  $result = $conn->query($sql);
	  return $result;
}
function getGeogId()
{
      global $conn;	
	  $sql = "select * from dim_location_geog";		
	  $result = $conn->query($sql);
	  return $result;
}
function getGeogIdtry($Geog_Id)
{
      global $conn;	
	  $sql = "select * from dim_location_geog where Geog_Id!='$Geog_Id'";		
	  $result = $conn->query($sql);
	  return $result;
}
function Insert_company_profile($lacaldate,$lacaltime,$store_id,$user_type,$name,$username,$password)
{
	global $conn;
	$sql = "insert into  company_profile set
                                Date ='$lacaldate',
			        Time ='$lacaltime',
				Geog_Id ='$store_id', 
				User_ID = '$user_type',
				Name = '$name',
				username ='$username',
				password ='$password',
			        passwordw ='$password'
                                
			   ";
	$result = $conn->query($sql);
	
}
function get_uname($username)
{
     global $conn;	
	 $sql = "select * from dim_user where username ='$username'";		
	  $result = $conn->query($sql);
	  return $result;
}
function getUser_details()
{
      global $conn;	
	  $sql = "select dim_user.Users_Type, company_profile.* from  company_profile ,dim_user
 where dim_user.User_ID = company_profile.User_ID order by Rec_id Desc
  ";		
	  $result = $conn->query($sql);
	  return $result;
}
function getUser_Update_Details($id)
{
      global $conn;	
	  $sql = "select * from company_profile where Rec_id ='$id' ";		
	  $result = $conn->query($sql);
	  return $result;
}

function deleteUser($id)
{
	global $conn;	
	  $sql = "delete from company_profile where Rec_id ='$id'";		
	  $result = $conn->query($sql);
	  return $result;
	
}

function Update_company_profile($lacaldate,$lacaltime,$store_id,$user_type,$name,$username,$password,$rec_id)
{
	global $conn;
	$sql = "Update  company_profile set
	            Date ='$lacaldate',
			    Time ='$lacaltime',
				Geog_Id ='$store_id', 
				User_ID = '$user_type',
				Name = '$name',
				username ='$username',
				password ='$password',
			    passwordw ='$password'
				where Rec_id = '$rec_id'
			   ";
	$result = $conn->query($sql);
	return $result;
}
///report queries


function stock_in_report($startdate,$enddate)
{
	global $conn;
	$sql = "Select stock_in_transaction.*,dim_item.Item_Name  from stock_in_transaction,dim_item  where Date between '$startdate' and '$enddate' and stock_in_transaction.Item_Id=dim_item.Item_Id";
	$result = $conn->query($sql);
	return $result;
}
function getspname3($supplier_id)
{
	global $conn;
	$sql = "select Supplier from dim_supplier where Supplier_Id='$supplier_id'";
	$result = $conn->query($sql);
	return $result;
}
function getitemnames($item_id)
{
	global $conn;
	$sql = "select Item_Name from dim_item where Item_Id='$item_id'";
	$result = $conn->query($sql);
	return $result;
}
function getlocations($inhouseid)
{
	global $conn;
	$sql = "select Location from dim_location_geog where Geog_Id='$inhouseid'";
	$result = $conn->query($sql);
	return $result;
}


function stock_out_report($startdate,$enddate)
{
	global $conn;
	$sql = "select stock_out_transaction.Date,stock_out_transaction.Transaction_Id,stock_out_transaction.Geog_Id as Stock_Location,
stock_out_transaction.Receiving_Geog_Id as Receiving_Location,stock_out_transaction.Item_Id,stock_out_transaction.Unit_Of_Measure,
stock_out_transaction.Quantity,stock_out_transaction.Price,
dim_item.Item_Name ,dim_location_geog.Location as Stock_Location
from stock_out_transaction,dim_item ,dim_location_geog
where Date between '$startdate' and '$enddate'
and stock_out_transaction.Item_Id=dim_item.Item_Id
and stock_out_transaction.Geog_Id=dim_location_geog.Geog_Id
";
	$result = $conn->query($sql);
	return $result;
}

function getitemnamesed()
{
	global $conn;
	$sql = "select * from dim_item where Available_Qty!='' and Available_Qty!='0'";
	$result = $conn->query($sql);
	return $result;
}
function reorderreport()
{
	global $conn;
	$sql = "select * from dim_item where Available_Qty<=Reorder_level";
	$result = $conn->query($sql);
	return $result;
}
/////Reorder Alert 
function ReorderAlert()
{
	global $conn;
	$sql = "select count(Item_Id) as countitem  from dim_item where Available_Qty<=Reorder_level";
	$result = $conn->query($sql);
	return $result;
}
/**************************Material Transfer Form***********************************/

function getMaterialTransferNo()
{
	global $conn;
	$sql = "select max(Transaction_Id)+1 as Transaction_Id from inter_dept_transaction";
	$result = $conn->query($sql);
	return $result;
	
}
function Insert_MaterialTransfer($transdate,$tran_no,$Issue_By,$Issue_To,$itemid,$unit_measure,$qty)

{
	global $conn;
	$sql = "Insert into inter_dept_transaction set 
                Date ='$transdate',
                Transaction_Id ='$tran_no',
				Issued_Geog_Id ='$Issue_By',
				Receiving_Geog_Id ='$Issue_To',
				Item_Id ='$itemid',
				Unit_Of_Measure ='$unit_measure',
				Issued_Qty = '$qty'
				";
   $result = $conn->query($sql);
	
	
}
function getAvlQtyOfIssueByGeog($item_Id,$IssueBy_id)
{
	global $conn;
	$sql = "select Availabe_Qty from dim_inter_dept_qty where Item_Id = '$item_Id' and Receiving_Geog_Id ='$IssueBy_id'";
	$result = $conn->query($sql);
	return $result;
	
}
function getAvlQtyOfIssueToGeog($IssueTo_id,$item_Id)
{
	global $conn;
	$sql = "select Availabe_Qty from dim_inter_dept_qty where Item_Id = '$item_Id' and Receiving_Geog_Id ='$IssueTo_id'";
	$result = $conn->query($sql);
	return $result;
	
}
function updateAvlQty_IssueByGeog($IssueBy,$item_id,$rem_qty)
{
	global $conn;
	$sql = "update  dim_inter_dept_qty set Availabe_Qty ='$rem_qty' where Item_Id = '$item_id' and Receiving_Geog_Id ='$IssueBy'";
	$result = $conn->query($sql);
	return $result;
}

function updateAvlQty_IssuToGeog($IssueTo,$item_id,$item_nm,$unit_measure,$rem_qty,$avlqty_interdep)
{
	
	global $conn;
if($avlqty_interdep == null)
{
    $sql = "insert into dim_inter_dept_qty set 
             	Receiving_Geog_Id ='$IssueTo',
			    Item_Id ='$item_id',
                             Item_Name ='$item_nm',
				Unit_Of_Measure ='$unit_measure',
				Availabe_Qty = '$rem_qty'
			  ";
}
else
{
	 $sql = "update  dim_inter_dept_qty set
	         Availabe_Qty ='$rem_qty' 
	         where Item_Id = '$item_id' 
	         and Receiving_Geog_Id ='$IssueTo'
			";
		
}
 $result = $conn->query($sql);
	
	
}

function AvlItem_interdept($location_id)
{
	global $conn;
	$sql = "select * from dim_inter_dept_qty where Receiving_Geog_Id ='$location_id' and Availabe_Qty>0";
	$result = $conn->query($sql);
	return $result;
	
}

?>