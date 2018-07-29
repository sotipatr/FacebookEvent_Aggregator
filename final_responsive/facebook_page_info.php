<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Events</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>

<h5 class="text-left">Δείτε τα στοιχεία της ιστοσελίδας που επιλέξατε:</h5>

<?php

$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
$con->query ('SET CHARACTER SET utf8');
$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');

mysqli_select_db($con,"facebookevents");
$link = $_REQUEST["link"];
$sql = "INSERT INTO pages(url) VALUES('$link')";

if(!mysqli_query($con,$sql))
    {
	printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }
	

$identifier = substr(strrchr($link,'/'),1); 
$access_token = "391620514343626|cfnfDZK9pPhaBMP9rCkmNIkeDFo";
$json_link = "https://graph.facebook.com/{$identifier}?access_token={$access_token}";
$json = file_get_contents($json_link);
$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

$onoma = $obj['name'];
$eikona= isset($obj['cover']['source']) ?$obj['cover']['source']:"" ;
$polh = isset($obj['location']['city']) ? $obj['location']['city'] : "";
$dromos = isset($obj['location']['street']) ? $obj['location']['street'] : "";
$tk= isset($obj['location']['zip']) ? $obj['location']['zip'] : "";
$location="";
 
if($polh && $dromos && $tk){
    $location="{$polh}, {$dromos}, {$tk}";
}else{
    $location="Location not set or event data is too old.";
}



echo "<table class='table table-responsive table-bordered'>";
	echo "<thead>";
		echo "<tr>";
			echo "<th><b><h5><em>#</em></b></h5></th>";
			echo "<th><b><h5><em>Εικόνα</em></b></h5></th>";
			echo "<th><b><h5><em>Ποίοι</em></b></h5></th>";
			echo "<th><b><h5><em>Που</em></b></h5></th>";
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
		echo "<tr>";
			echo "<td><b><h5>1</b></h5></td>";
			echo "<td><img src='{$eikona}' class='img-responsive' style='width:300px; height:100px'></td>";
			echo "<td><b><h5>{$onoma}</h5></b></td>";
			echo "<td><h5>{$location}</h5></td>";
		echo "</tr>";
	echo "</tbody>";
echo "</table>";

mysqli_close($con);
?>

</body>

</html>