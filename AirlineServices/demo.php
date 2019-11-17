<?php
include_once "connection.php";
$city = "SELECT * FROM `flight` INNER JOIN citycredentials ON citycredentials.id=flight.sourcecity GROUP BY citycredentials.cityname";
$result = mysqli_query($con, $city);
$ar = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($ar, $row);
}
echo json_encode($ar);

?>