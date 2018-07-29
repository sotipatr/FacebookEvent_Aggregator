<!DOCTYPE html>
<head>
 
    <title>patrorama</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
 
  
 
    
 
</head>

<script>
function noresults()
{
	alert('Δεν υπάρχουν αποτελέσματα!');
	window.location="http://localhost/final_responsive/index.php";
	
}

</script>

<body>

<?php 

//connect to database
$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
mysqli_select_db($con,"facebookevents");
$con->query ('SET CHARACTER SET utf8'); 
$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
$num_rec_per_page=12;
if (isset($_GET['page'])) { $page  = $_GET['page']; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page;

if (isset($_GET['key']))
{
$key=$_GET['key']; //kleidi anazhthshs
}
else 
{
	$key="input";
}

if ($key=='allcategories')
{
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category  FROM events ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page";
	$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category  FROM events ORDER BY start_date ASC, start_time ASC";
}
elseif ($key=='theater')
{
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%Organization%' OR category LIKE '%Arts%' OR category LIKE '%Theater%' OR category LIKE '%Education%' OR category LIKE '%Community%' ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page" ;
	$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%Organization%' OR category LIKE '%Arts%' OR category LIKE '%Theater%' OR category LIKE '%Education%' OR category LIKE '%Community%' ORDER BY start_date ASC, start_time ASC";
}
elseif ($key=='concert')
{
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%Musician/Band%' OR category LIKE'%Concert%' ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page" ;
	$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%Musician/Band%' OR category LIKE'%Concert%' ORDER BY start_date ASC, start_time ASC";
}
elseif ($key=='party')
{
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%party%' OR category LIKE '%Bar%' OR category LIKE '%Club%' OR category LIKE '%Local Business%' OR category LIKE '%Cafe%' OR category LIKE '%Radio Station%' ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page" ;
	$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%party%' OR category LIKE '%Bar%' OR category LIKE '%Club%' OR category LIKE '%Local Business%' OR category LIKE '%Radio Station%' ORDER BY start_date ASC, start_time ASC";
}
elseif ($key=='alldates')
{
    $sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page";
	$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events ORDER BY start_date ASC, start_time ASC";
}
elseif ($key=='today')
{ 
    $today=date('Y-m-d'); 
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE start_date='$today' ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page" ;
	$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE start_date='$today' ORDER BY start_date ASC, start_time ASC";
}
elseif ($key=='tomorrow')
{
	$tomorrow=date('Y-m-d', strtotime(' +1 day')); 
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE start_date='$tomorrow' ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page" ;
	$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE start_date='$tomorrow' ORDER BY start_date ASC, start_time ASC";
}
elseif ($key=='week')
{
 $current=date('Y-m-d');
 $current_plus_week=date('Y-m-d', strtotime(' +6 day') );
 $sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE start_date between '$current' and '$current_plus_week'  ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page" ;
 $sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE start_date between '$current' and '$current_plus_week'  ORDER BY start_date ASC, start_time ASC";
}

elseif ($key=='input')
{
	if(isset($_GET['from'])&& isset($_GET['to']) )
	{
		$flag=1;
		$from=$_GET['from'];
		$to=$_GET['to'];
		$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE start_date between '$from' and '$to' ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page";
		$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE start_date between '$from' and '$to' ORDER BY start_date ASC, start_time ASC";
	}
	if(isset($_GET['keyword']))
		
	{ 
		$flag=2;
		$word=$_GET['keyword'];
		$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE description LIKE '%$word%' OR name LIKE '%$word%' ORDER BY start_date ASC, start_time ASC LIMIT $start_from, $num_rec_per_page" ;
		$sql_tot="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE description LIKE '%$word%' OR name LIKE '%$word%' ORDER BY start_date ASC, start_time ASC";
	}
	
}


 //run the query
$result=mysqli_query($con, $sql); 

if(!mysqli_query($con,$sql))
    {
	printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }
$num_rows = mysqli_num_rows($result);


if ($num_rows>0)
{
	include 'events.php';
	
	/*pagination*/
	$rs_result = mysqli_query($con,$sql_tot); //run the query
	$total_records = mysqli_num_rows($rs_result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
	echo "<center> <div class='content' style='width:100%;padding-top:20px;padding-bottom:20px;font-size:200%'>";
	
	
	if ($key=="input" && $flag==1){
		echo "<a href='search.php?key=$key&to=$to&from=$from&page=1' style='text-decoration:none;font-weight:bold;color:black'>".'|<'."</a> "; // Goto 1st page  
		for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='search.php?key=$key&to=$to&from=$from&page=".$i."' style='text-decoration:none;font-weight:bold;color:black;font-family:curier;'> ".$i." </a> "; 
	}
	echo "<a href='search.php?key=$key&to=$to&from=$from&page=$total_pages' style='text-decoration:none;font-weight:bold;color:black'>".'>|'."</a> "; // Goto last page
	}
	
	else if ($key=="input" && $flag==2){
		echo "<a href='search.php?key=$key&keyword=$word&page=1' style='text-decoration:none;font-weight:bold;color:black'>".'|<'."</a> "; // Goto 1st page  
		for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='search.php?key=$key&keyword=$word&page=".$i."' style='text-decoration:none;font-weight:bold;color:black;font-family:curier;'> ".$i." </a> "; 
	}
	echo "<a href='search.php?key=$key&keyword=$word&page=$total_pages' style='text-decoration:none;font-weight:bold;color:black'>".'>|'."</a> "; // Goto last page
	}
	else{
		echo "<a href='search.php?key=$key&page=1' style='text-decoration:none;font-weight:bold;color:black'>".'|<'."</a> "; // Goto 1st page  
		for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='search.php?key=$key&page=".$i."' style='text-decoration:none;font-weight:bold;color:black;font-family:curier;'> ".$i." </a> "; 
		}; 
	echo "<a href='search.php?key=$key&page=$total_pages' style='text-decoration:none;font-weight:bold;color:black'>".'>|'."</a> "; // Goto last page
	}
	
	echo "</div> </center>";
	
}

else
{
	//no results
echo '<script type="text/javascript">'
   , 'noresults();'
   , '</script>'
;
}

mysqli_close($con);	
 ?>
</body>