<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["year"]))
{
 $query = "
 SELECT * FROM performance 
 WHERE MONTH(date)='04' and DAYOFWEEK(date) = '".$_POST["year"]."' 
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
