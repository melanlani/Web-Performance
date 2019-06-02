<?php

include('database_connection.php');

$column = array('id_performance', 'target_time', 'work_time', 'achievement', 'over_time', 'date');

$query = "
SELECT * FROM performance 
";

if(isset($_POST['year']) && $_POST['year'] != '')
{
 $query .= '
 WHERE MONTH(date) = "04" and DAYOFWEEK(date) = "'.$_POST['year'].'" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY date ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id_performance'];
 $sub_array[] = $row['target_time'];
 $sub_array[] = $row['work_time'];
 $sub_array[] = $row['achievement'];
 $sub_array[] = $row['over_time'];
 $sub_array[] = date('l', strtotime($row['date']));
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM performance";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($connect),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>