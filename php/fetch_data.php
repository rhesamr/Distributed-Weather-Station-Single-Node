<?php

//connecting to database
$MyUsername = "admin";

$MyPassword = "terserah";

$MyHostname = "localhost";

$MyPort = 3306;

$MyDatabaseName = "WeatherData";


$conn = mysqli_connect($MyHostname,$MyUsername,$MyPassword,$MyDatabaseName,$MyPort);
$db = mysql_select_db("WeatherData", $conn);

//fetching data
$query = "SELECT * FROM data";
$result = mysql_query($query) or die(mysql_error());

$row = mysql_fetch_array($result);
//print_r($row);
$temperature = $row[0];

echo $temperature . "<BR>";

//display the data

?>