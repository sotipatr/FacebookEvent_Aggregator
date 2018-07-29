<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="layout1/layout.css" type="text/css" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body>

<?php

$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
$con->query ('SET CHARACTER SET utf8');
$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
mysqli_select_db($con,"facebookevents");

$sql = "DELETE FROM pages WHERE id=''";
if(!mysqli_query($con,$sql))
    {
	printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }
mysqli_close($con);

?>
<h5>Επιτυχής διαγραφή!</h5>

</body>

</html>