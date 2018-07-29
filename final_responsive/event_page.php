<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>patrorama</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" media="(max-width: 600px)" href="layout1/layout.css">
	<link rel="stylesheet" media="(min-width: 600px) and (max-width:850px)" href="layout2/layout.css">
	<link rel="stylesheet" media="(min-width: 850px) and (max-width:1150px)" href="layout3/layout.css">
	<link rel="stylesheet" media="(min-width: 1150px)" href="layout4/layout.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/layout/scripts/form_validation.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>

</head>
<script>
function login()
	{
		var username = document.loginform.username.value;
		var password = document.loginform.username.value;
		if ( username == "admin" && password == "admin")
		{
			alert ("Login successfully");
			return true;
		}
		else
		{
			alert ("Try again!");
			return false;
		}
	}
	
  function show(id) {
    document.getElementById(id).style.visibility = "visible";
  }
  function hide(id) {
    document.getElementById(id).style.visibility = "hidden";
  }
  function fix_size(id1,id2) {
	document.getElementById(id1).style.height = document.getElementById(id2).height;
  }
  
  window.onload = function() {
  fix_size('div11', 'img11');
  fix_size('div12', 'img12');
  fix_size('div13', 'img13');
  fix_size('div14', 'img14');

}

function initialize()
{
var mapProp = {
  center: myCenter,
  zoom:13,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position: myCenter,
  title:'Click to zoom'
  });

marker.setMap(map);

// Zoom to 15 when clicking on marker
google.maps.event.addListener(marker,'click',function() {
  map.setZoom(15);
  map.setCenter(marker.getPosition());
  });
}
google.maps.event.addDomListener(window, 'load', initialize);

function show1(x)
{
	x.value="yyyy-mm-dd";
}

function hide1(x)
{
	x.value="";
}

function home()
{
	window.location="http://localhost/final_responsive/index.php";
}


</script>

<body>


<!-----------------------------------------------------------top menu---------------------------------------------------------------------------------------------------->
	
	<div id="search_menu">
    
	<div id="header">
     <h1> <a href="index.php" style="text-decoration: none; color: #40566B" >patrorama.gr </a></h1>
    </div>

<ul class="search">
      <li class="menu"><em>Αναζήτησε εκδήλωση: </em></li>
	  <li class="menu backg">
			<a class="toplist " href="">Ανά κατηγορία</a>
			<ul>
			    <br>
				<li class="sublist backg"><a href="http://localhost/final_responsive/search.php?key=allcategories" class="sublist">Όλες οι κατηγορίες</a></li> <br>
				<li class="sublist backg"><a href="http://localhost/final_responsive/search.php?key=theater" class="sublist">Τέχνες</a></li> <br>
				<li class="sublist backg"><a href="http://localhost/final_responsive/search.php?key=concert" class="sublist">Συναυλίες</a></li> <br>
				<li class="sublist backg"><a href="http://localhost/final_responsive/search.php?key=party" class="sublist">Party</a></li> <br>
				
			    
			</ul>
		</li>
		<li class="menu backg">
			<a class="toplist" href=""> Ανά ημερομηνία</a>
			<ul>
				<br>
				<li class="sublist backg"><a href="http://localhost/final_responsive/search.php?key=alldates" class="sublist">Όλες</a></li> <br>
				<li class="sublist backg"><a href="http://localhost/final_responsive/search.php?key=today" class="sublist" >Σήμερα</a></li> <br>
				<li class="sublist backg"><a href="http://localhost/final_responsive/search.php?key=tomorrow" class="sublist">Αύριο</a></li> <br>
				<li class="sublist backg"><a href="http://localhost/final_responsive/search.php?key=week" class="sublist">Όλη την εβδομάδα</a></li> <br>
				<li class="sublist">
					<form name="myForm" action="http://localhost/final_responsive/search.php" method="get" style="margin: 4; padding: 4;">
						<input id="input_form" type="text" name="from" onmouseover="show1(this)"; onclick="hide1(this)" required >
						<input id="input_form" type="text" name="to" onmouseover="show1(this)"; onclick="hide1(this)" required>
						<input type="submit" value="Search">
					</form>
				</li>
			</ul>
		</li>
		<li class="menu backg">
			<a class="toplist backg" href="">Γενική Αναζήτηση</a>
			<ul>
				<br>
				<li class="sublist"> 
					<form action="http://localhost/final_responsive/search.php" method="get"> 
						<input type="text" id="search_form" name="keyword" value="insert keyword" onclick="hide1(this)"> 
					</form>
				</li> 
			</ul>
		</li>
	
	</ul>
  
  
	<ul class="login"> 
	  <li class="menu backg" style="padding-top=40px"> My patrorama 
	  <ul>
		<br>
	       <li class="sublogin">
		      <form name="loginform" action="http://127.0.0.1/final_responsive/administrator.php" onsubmit="return login();" onclick="hide(this)"  method="post" >
						<input type="text" id="input_form" onclick="hide1(this)"  name="username" value="username" required><br>
						<input type="password" id="input_form" onclick="hide1(this)"  name="password" value="password" required><br>
						<input type="submit" value="Login">
				</form>
				
		   </li>
		</ul>
	  </li>
    </ul>
</div>

 
<?php 

//connect to database
$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
mysqli_select_db($con,"facebookevents");
$con->query ('SET CHARACTER SET utf8');
$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');

$key=$_GET['key']; //kleidi anazhthshs
$sql="SELECT id,start_time,start_date,picture,name,description,place_name,city,country,zip,latitude,longitude,category,owner  FROM events WHERE id='$key' ORDER BY start_date ASC";
$select = mysqli_query($con, $sql); 
if(!mysqli_query($con,$sql))
    {
	printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }
$fetch=mysqli_fetch_assoc($select);
$id = $fetch['id'];
$image = $fetch['picture'];
$name = $fetch['name'];
$country = $fetch['country'];
$city = $fetch['city'];
$street = $fetch['place_name'];
$zip= $fetch['zip'];
$hoster = $fetch['owner'];
$category = $fetch['category'];
$lat = $fetch['latitude'];
$lon = $fetch['longitude'];
$description = $fetch['description'];
if ($description=="")
{	
	$description="Δεν διατίθεται περιγραφή";
}
$start_date = date( 'l, F d, Y', strtotime($fetch['start_date']));
$start_time = $fetch['start_time'];
$location="";
$url="https://www.facebook.com/{$id}";
if($country && $city && $street && $zip){
	$location="{$country},{$city}, {$street}, {$zip}";
}else{
	$location="Location not set or event data is too old.";
}

echo"<script> var myCenter=new google.maps.LatLng({$lat},{$lon}); </script>";

echo"<div style='padding-top:150px'>
	<header style='padding-top:10px'>
		 <h2 style='padding-left:20px'>{$name}</h2>
		</header>
	<div style='float:left;padding-left:20px;padding-right:30px;padding-top:10px'>
	<img width='330px' height='250px' src='{$image}' />
	</div>
	<div style='float:left;padding-left:20px;padding-right:30px;padding-top:10px'>
	<p style='padding-top:10px'>Ημερομηνία εκδήλωσης: {$start_date}</p>
	<p style='padding-top:10px'>Ώρα εκδήλωσης: {$start_time}</p>
	<p style='padding-top:10px'>Τοποθεσία εκδήλωσης: {$location}</p>
	<p style='padding-top:10px'>Διοργανωτής: {$hoster}</p>
	<p style='padding-top:10px'>Κατηγορία δημιουργού εκδήλωσης:{$category}</p>
	<p style='padding-top:10px'>Facebook page:   <a href='{$url}' target='_blank'>View on Facebook</a></p>
	
</div>
<div style='float:left;padding-left:20px;padding-right:30px;padding-top:10px'>
<p style='padding-top:10px'>Περιγραφή εκδήλωσης:<br>{$description}</p>
</div>

<div style='float:left;padding-left:20px;padding-right:30px;padding-top:10px;padding-bottom:30px'>";
if(($lat==0)&&($lon==0))
{
	echo"<p style='padding-top:10px'>Δε διατήθεται χάρτης για τη συγκεκριμένη εκδήλωση λόγω έλλειψης συντεταγμένων.<br></p>";
}
else{
	echo"<p style='padding-top:10px'>Χάρτης τοποθεσίας εκδήλωσης:<br></p>
		 <div id='googleMap' class='map'></div>"	;
}
echo"</div>
</div>
";
	
?>

</body>

</html>