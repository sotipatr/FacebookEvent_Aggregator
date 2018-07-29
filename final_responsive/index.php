<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>patrorama</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" media="(max-width: 600px)" href="layout1/layout.css">
	<link rel="stylesheet" media="(min-width: 600px) and (max-width:1150px)" href="layout2/layout.css">
	<link rel="stylesheet" media="(min-width: 1150px)" href="layout4/layout.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
 
</head>
<script>
/***login validation****/
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
/******event image*****/
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
 
};
/***date form**/
function show1(x)
{
	x.value="yyyy-mm-dd";
}

function hide1(x)
{
	x.value="";
}

/****rss****/
$(document).ready(function(){
	$("#rssf").hide();
	$("#rssp").hide();
	
    $("#rssi").click(function(){
        $("#rssf").show("fast");
		$("#rssp").show("fast");
    });
});

function popupform(myform, windowname)
{
	if (! window.focus) return true;
	window.open('', windowname, 'height=600,width=300,scrollbars=no,toolbar=no');
	myform.target=windowname;
	return true;
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
						<center><input id="input_form" type="text" name="from" onmouseover="show1(this)"; onclick="hide1(this)" required ></center>
						<center><input id="input_form" type="text" name="to" onmouseover="show1(this)"; onclick="hide1(this)" required></center>
						<center><input type="submit" value="Search"></center>
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

<div class="Rss" style="padding-top:120px"> 

	<img id="rssi" src="http://localhost/final_responsive/rss.jpg">
	<br>
	<p id="rssp"> Επέλεξε κατηγορίες: </p>
		<form name="RssForm" id="rssf" action="http://localhost/final_responsive/rss.php" method="post" onSubmit="popupform(this, 'join')">
			<input type="checkbox" name="check[]" value="theater">Τέχνες </input>
			<input type="checkbox" name="check[]" value="concert"> Μουσική</input>
			<input type="checkbox" name="check[]" value="party">Πάρτυ </input>
			<input type="submit" name="submit"></input>
		</form>

</div>
<!------------------------------------------------end of top menu--------------------------------------------------------------------->

<!------------------------------------------------emfanish events kentrikhs selidas--------------------------------------------------------------------->
	<?php 
	
	echo"<div class='border'>
	<div class='tetrades'>
	<div class='content' style='width:100%;height:40px'>
	<p class='titlos' >ΤΕΧΝΕΣ</p> </div>";
	//connect to database
	$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
	mysqli_select_db($con,"facebookevents");
	$con->query ('SET CHARACTER SET utf8'); 
	$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%Organization%' OR category LIKE '%Arts%' OR category LIKE '%Theater%' OR category LIKE '%Education%' OR category LIKE '%Community%' ORDER BY start_date ASC, start_time ASC" ;
	//-run  the query against the mysql query function 
	$result=mysqli_query($con, $sql);
	
	if(!mysqli_query($con,$sql))
    {
		printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }
	$num_rows = mysqli_num_rows($result);

	if ($num_rows>0)
	{
		for($i=0;$i<min($num_rows,4);$i++)
		{
			$fetch=mysqli_fetch_assoc($result);
			$id = $fetch['id'];
			$category = $fetch['category'];
			$picture = $fetch['picture'];
			$name = $fetch['name'];
			$start_date = date( 'l, F d, Y', strtotime($fetch['start_date']));
			$start_time = $fetch['start_time'];
			$place_name=$fetch['place_name'];
			echo"<a href='http://localhost/final_responsive/event_page.php?key={$id}' style='text-decoration: none; color: black'>
					<div id='t_item' class='content' onMouseOver=show('div1{$i}') onMouseOut=hide('div1{$i}')>
						<div id='div1{$i}' class='perigrafh'>
						<header>";
							echo"<h1>{$name}</h1>";
						echo"</header>
						</div>
					<div>
						<img id='img1{$i}' class='image_size' src='{$picture}' />
					</div>
					<div class='upotitlos'>
						<p>{$place_name}</p>
						<p>{$start_date} at {$start_time}</p>
						<p>Κατηγορία:{$category}</p>
					</div>
					</div>
				</a>";
		}
		if(($i==4) && ($num_rows>4))
		{
		echo"<div class='content' style='width:200px;height:40px'>
			<p><a  id='link' href='http://localhost/final_responsive/search.php?key=theater'><em>View more events...</em></a></p>
			</div>";
		}
	}
	else
	{
		echo "<h style='font-size:30px'> Δε διατήθενται events απο αυτή την κατηγορία.";
	}
	echo"</div>";

	//-----------------------------------------------------------------------------------------//
	echo"<div class='tetrades'>
	<div class='content' style='width:100%;height:40px'>
	<p class='titlos' >ΣΥΝΑΥΛΙΕΣ</p> </div> ";
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%Musician/Band%' OR category LIKE '%Concert%' ORDER BY start_date ASC, start_time ASC" ;
	//-run  the query against the mysql query function 
	$result=mysqli_query($con, $sql);
	
	if(!mysqli_query($con,$sql))
    {
		printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }
	$num_rows = mysqli_num_rows($result);

	if ($num_rows>0)
	{
		for($i=0;$i<min($num_rows,4);$i++)
		{
			$fetch=mysqli_fetch_assoc($result);
			$id = $fetch['id'];
			$category = $fetch['category'];
			$picture = $fetch['picture'];
			$name = $fetch['name'];
			$start_date = date( 'l, F d, Y', strtotime($fetch['start_date']));
			$start_time = $fetch['start_time'];
			$place_name=$fetch['place_name'];
			echo"<a href='http://localhost/final_responsive/event_page.php?key={$id}' style='text-decoration: none; color: black'>
					<div id='t_item' class='content' onMouseOver=show('div2{$i}') onMouseOut=hide('div2{$i}') >
						<div id='div2{$i}' class='perigrafh'>
						<header>";
							echo"<h1>{$name}</h1>";
						echo"</header>
						</div>
					<div>
						<img id='img2{$i}' class='image_size' src='{$picture}' />
					</div>
					<div class='upotitlos'>
						<p>{$place_name}</p>
						<p>{$start_date} at {$start_time}</p> 
						<p>Κατηγορία:{$category}</p>
					</div>
					</div>
				</a>";
		}
		if(($i==4) && ($num_rows>4))
		{
		echo"<div class='content' style='width:200px;height:40px'>
			<p><a  id='link' href='http://localhost/final_responsive/search.php?key=concert'><em>View more events...</em></a></p>
			</div>";
		}		
	}
	else
	{
		echo "<h style='font-size:30px'> Δεν διατίθενται events απο αυτή την κατηγορία.";
	}
	echo"</div>";

//--------------------------------------------------------------------------------------------------------------------//
	echo"<div class='tetrades'>
	<div class='content' style='width:100%;height:40px'>
	<p  class='titlos'>ΠΑΡΤΥ</p> </div>";
	$sql="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%party%' OR category LIKE '%Bar%' OR category LIKE '%Cafe%' OR category LIKE '%Club%' OR category LIKE '%Local Business%' OR category LIKE '%Radio Station%' ORDER BY start_date ASC, start_time ASC " ;
	//-run  the query against the mysql query function 
	$result=mysqli_query($con, $sql);
	
	if(!mysqli_query($con,$sql))
    {
	   printf("Wrong way");
       die('Error : ' . mysqli_error($con));
    }
	$num_rows = mysqli_num_rows($result);

	if ($num_rows>0)
	{
		for($i=0;$i<min($num_rows,4);$i++)
		{
			$fetch=mysqli_fetch_assoc($result);
			$id = $fetch['id'];
			$category = $fetch['category'];
			$picture = $fetch['picture'];
			$name = $fetch['name'];
			$start_date = date( 'l, F d, Y', strtotime($fetch['start_date']));
			$start_time = $fetch['start_time'];
			$place_name=$fetch['place_name'];
			echo"<a href='http://localhost/final_responsive/event_page.php?key={$id}' style='text-decoration: none; color: black'>
					<div id='t_item' class='content' onMouseOver=show('div3{$i}') onMouseOut=hide('div3{$i}') >
						<div id='div3{$i}' class='perigrafh'>
						<header>";
							echo"<h1>{$name}</h1>";
						echo"</header>
						</div>
					<div>
						<img id='img3{$i}' class='image_size' src='{$picture}' />
					</div>
					<div class='upotitlos'>
						<p>{$place_name}</p>
						<p>{$start_date} at {$start_time}</p> 
						<p>Κατηγορία:{$category}</p>
					</div>
					</div>
				</a>";
		}
		if(($i==4) && ($num_rows>4))
		{
		echo"<div class='content' style='width:200px;height:40px'>
			<p><a  id='link' href='http://localhost/final_responsive/search.php?key=party'><em>View more events...</em></a></p>
			</div>";
		}
	}

	else
	{
		echo "<h style='font-size:30px'> Δε διατήθενται events απο αυτή την κατηγορία.";
	}
	echo"</div>";
	
	
mysqli_close($con);	
 ?>
 </div>
 
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------->

</body>

</html>