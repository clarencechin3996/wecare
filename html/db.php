<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dataBaseName = "WeCare";

$conn = mysqli_connect($serverName,$userName,$password,$dataBaseName) or die("Connection failed: " . mysqli_connect_error());

if (!$conn){
    die ("Error: ".mysqli_connect_error());
}
