<?php
// SQL Credentials
$MyUsername = "admin";
$MyPassword = "terserah";
$MyHostname = "localhost";
$MyPort = 3306;
$MyDatabaseName = "WeatherData";

// Open connection to SQL
$con = mysqli_connect($MyHostname,$MyUsername,$MyPassword,$MyDatabaseName,$MyPort);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
