<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["startday"], $_POST["endday"]) )
{
	$dateday =$_POST["startday"];
	$dateendday =$_POST["endday"];
 	$query = "
	SELECT * FROM performance 
	WHERE date BETWEEN '$dateday' AND '$dateendday'
	ORDER BY id_performance ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output[] = array(
		'day'   => date('D', strtotime($row['date'])),
		'achieve'  => intval($row["achievement"])
	  	);
	}
	echo json_encode($output);
}

?>
