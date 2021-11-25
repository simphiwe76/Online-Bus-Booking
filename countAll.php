<?php

include_once 'database/dbConn.php';
session_start();



$sql = "SELECT tripID, tripName, tripTime ,COUNT(*) as 'count'
        FROM tripbook
        GROUP BY tripName, tripTime ";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if ($num>0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
            echo $row['tripName']."  ".$row['tripTime']."  ".$row['count'];
            echo "<br>";
    }
}





?>
