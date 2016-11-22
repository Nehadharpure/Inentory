
<?php 
include('connection.php');
$getalertreorder = ReorderAlert();
while (
$reorderalert = $getalertreorder->fetch())
{
	echo $reorderalert['countitem'];
}


?>