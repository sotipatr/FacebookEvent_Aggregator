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

<body>

<?php

echo "<table class='table table-hover table-responsive table-bordered'>";
$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
$con->query ('SET CHARACTER SET utf8');
$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
mysqli_select_db($con,"facebookevents");
$sql = "SELECT * FROM pages";
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
								echo "<th><b><h5><em>Γεγονός</em></b></h5></th>";
								echo "<th><b><h5><em>Τοποθεσία</em></b></h5></th>";
							echo "</tr>";
						echo "</thead>";
	    while($fetch=mysqli_fetch_assoc($select)) 
		{
			$x=$x+1;
			$eikona = $fetch['eikona'];
			$onoma = $fetch['onoma'];
			$polh = $fetch['polh'];
			$dromos = $fetch['dromos'];
			$tk= $fetch['tk'];
			$location="";
 
			if($polh && $dromos && $tk){
				$location="{$polh}, {$dromos}, {$tk}";
			}else{
				$location="Location not set.";
			}
			
				echo "<tbody>";
					echo "<tr>";
						echo "<td><b><h5>$x</b></h5></td>";
						echo "<td><img src='{$eikona}' class='img-responsive' style='width:50%; height:50%'></td>";
						echo "<td><b><h5>{$onoma}</h5></b></td>";
						echo "<td><h5>{$location}</h5></td>";
					echo "</tr>";
				echo "</tbody>";
		}
		echo "</table>";
mysqli_close($con);

?>

</body>
</html>