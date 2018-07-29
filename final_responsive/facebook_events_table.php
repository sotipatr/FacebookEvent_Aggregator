<!DOCTYPE html>
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('public');
?>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="layout1/layout.css" type="text/css" />	
</head>

<body class="admin">

<?php

echo "<table class='table table-hover table-responsive table-bordered'>";
$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
$con->query ('SET CHARACTER SET utf8');
$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
mysqli_select_db($con,"facebookevents");
$sql = "SELECT * FROM events";
$select = mysqli_query($con, $sql); 
if(!mysqli_query($con,$sql))
    {
	printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }
$num_of_events = mysqli_num_rows($select);
$x=0;
		echo "<table class='table table-responsive table-bordered'>";
						echo "<thead>";
							echo "<tr>";
								echo "<th><b><h5><em>#</em></b></h5></th>";
								echo "<th><b><h5><em>Εικόνα</em></b></h5></th>";
								echo "<th><b><h5><em>Όνομα</em></b></h5></th>";
								echo "<th><b><h5><em>Τοποθεσία</em></b></h5></th>";
								echo "<th><b><h5><em>Ημερομηνία/Ώρα</em></b></h5></th>";
							echo "</tr>";
						echo "</thead>";
	    while($fetch=mysqli_fetch_assoc($select)) 
		{
			$x=$x+1;
			$eikona = $fetch['picture'];
			$onoma = $fetch['name'];
			$xwra = $fetch['country'];
			$polh = $fetch['city'];
			$dromos = $fetch['place_name'];
			$tk= $fetch['zip'];
			$start_date = date( 'l, F d, Y', strtotime($fetch['start_date']));
			$start_time = $fetch['start_time'];
			$location="";
 
			if($xwra && $polh && $dromos && $tk){
				$location="{$xwra},{$polh}, {$dromos}, {$tk}";
			}else{
				$location="Location not set or event data is too old.";
			}
			
				echo "<tbody>";
					echo "<tr>";
						echo "<td><b><h5>$x</b></h5></td>";
						echo "<td><img src='{$eikona}' class='img-responsive' style='width:70%; height:70%'></td>";
						echo "<td><b><h5>{$onoma}</h5></b></td>";
						echo "<td><h5>{$location}</h5></td>";
						echo "<td><h5>{$start_date} at {$start_time}</h5></td>";
					echo "</tr>";
				echo "</tbody>";
		}
		echo "</table>";
mysqli_close($con);

?>

</body>
</html>