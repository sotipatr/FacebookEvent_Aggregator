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
//connect to database
$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
mysqli_select_db($con,"facebookevents");
$con->query ('SET CHARACTER SET utf8');
$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');

/*******page**********/
$sql = "SELECT url FROM pages WHERE id=''";
$select = mysqli_query($con, $sql); 
$fetch = mysqli_fetch_assoc($select);
$link = $fetch['url'];
$identifier = substr(strrchr($link,'/'),1); 
$access_token = "391620514343626|cfnfDZK9pPhaBMP9rCkmNIkeDFo";
$json_link = "https://graph.facebook.com/{$identifier}?access_token={$access_token}";
$json = file_get_contents($json_link);
$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
$eid = $obj['id'];
$onoma = $obj['name'];
$eikona= isset($obj['cover']['source']) ?$obj['cover']['source']:"" ;
$polh = isset($obj['location']['city']) ? $obj['location']['city'] : "";
$dromos = isset($obj['location']['street']) ? $obj['location']['street'] : "";
$tk= isset($obj['location']['zip']) ? $obj['location']['zip'] : "";
$category=isset($obj['category']) ? $obj['category'] : "";
$location="";
 
if($polh && $dromos && $tk){
    $location="{$polh}, {$dromos}, {$tk}";
}else{
    $location="Location not set or event data is too old.";
}
$sql = "DELETE FROM `pages` WHERE id=''";
if(!mysqli_query($con,$sql))
    {
	printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }

$sql = "INSERT INTO pages(id,onoma,eikona,polh,dromos,tk,url,category) VALUES('$eid','$onoma','$eikona','$polh','$dromos','$tk','$link','$category')";
if(!mysqli_query($con,$sql))
    {
	printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }

/******events********/
$year_range = 2;
$since_unix_timestamp = strtotime(date("Y-m-d"));		
$d=strtotime("+5 Months");
$until_unix_timestamp = strtotime(date("Y-m-d", $d));
$access_token = "391620514343626|cfnfDZK9pPhaBMP9rCkmNIkeDFo";
$fields="id,name,description,place,timezone,start_time,cover";
$json_link = "https://graph.facebook.com/{$eid}/events/attending/?fields={$fields}&access_token={$access_token}&since={$since_unix_timestamp}&until={$until_unix_timestamp}";
$json = file_get_contents($json_link);
$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
$event_count = count($obj['data']);
 
for($x=0; $x<$event_count; $x++)
 {
	$day = date('l',  strtotime($obj['data'][$x]['start_time']));
	$start_date = date( 'Y-m-d', strtotime($obj['data'][$x]['start_time']));
	$start_time = date('H:i', strtotime($obj['data'][$x]['start_time'])+60*60); // sync to local time
	$pic_big = isset($obj['data'][$x]['cover']['source']) ? $obj['data'][$x]['cover']['source'] : "https://graph.facebook.com/{$eid}/picture?type=large";
	$eid = $obj['data'][$x]['id'];
	$name = $obj['data'][$x]['name'];
	$description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";
	$place_name = isset($obj['data'][$x]['place']['name']) ? $obj['data'][$x]['place']['name'] : "";
	$city = isset($obj['data'][$x]['place']['location']['city']) ? $obj['data'][$x]['place']['location']['city'] : "";
	$country = isset($obj['data'][$x]['place']['location']['country']) ? $obj['data'][$x]['place']['location']['country'] : "";
	$zip = isset($obj['data'][$x]['place']['location']['zip']) ? $obj['data'][$x]['place']['location']['zip'] : "";
	$coor_x= isset($obj['data'][$x]['place']['location']['latitude']) ? $obj['data'][$x]['place']['location']['latitude'] : "";
	$coor_y= isset($obj['data'][$x]['place']['location']['longitude']) ? $obj['data'][$x]['place']['location']['longitude'] : "";
	$location=""; 
	
	if($place_name && $city && $country && $zip){
		$location="{$place_name}, {$city}, {$country}, {$zip}";
	}else{
		$location="Location not set or event data is too old.";
	}
	
	$sql = "INSERT INTO events(id,start_time,start_date,picture,name,description,place_name,city,country,zip,latitude,longitude,category,owner) VALUES('$eid','$start_time','$start_date','$pic_big','$name','$description','$place_name','$city','$country','$zip','$coor_x','$coor_y','$category','$onoma')";
	if(!mysqli_query($con,$sql))
		{
		printf("Wrong way");
		   die('Error : ' . mysqli_error($con));
		}
 }

mysqli_close($con);

?>
<h5>Επιτυχής αποθήκευση!</h5>
</body>
</html>