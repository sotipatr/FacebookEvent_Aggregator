<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Αποτελέσματα Αναζήτησης</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" media="(max-width: 600px)" href="layout1/layout.css">
	<link rel="stylesheet" media="(min-width: 600px) and (max-width:850px)" href="layout2/layout.css">
	<link rel="stylesheet" media="(min-width: 850px) and (max-width:1150px)" href="layout3/layout.css">
	<link rel="stylesheet" media="(min-width: 1150px)" href="layout4/layout.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="C:\wamp\www\patrorama\layout\scripts\form_validation.js"> </script>
	
<script>
  function show(id) {
    document.getElementById(id).style.visibility = "visible";
  }
  function hide(id) {
    document.getElementById(id).style.visibility = "hidden";
  }
  function fix_size(id1,id2) {
    document.getElementById(id1).style.width = document.getElementById(id2).width;
	document.getElementById(id1).style.height = document.getElementById(id2).height;
  }
  
  window.onload = function() {
  fix_size('div', 'img');

};

function login()
	{
		var username = document.loginform.username.value;
		var password = document.loginform.password.value;
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
	
	function show1(x)
{
	x.value="yyyy-mm-dd";
}

function hide1(x)
{
	x.value="";
}


</script>



</head>

<body id="top">

<!-----------------------------------------------------------top menu---------------------------------------------------------------------------------------------------->
	<div id="search_menu">
	
		<div id="header">
			<h1> <a href="index.php" style="text-decoration: none; color: #40566B" >patrorama.gr </a></h1>
		</div>
<ul class="search">
      <li class="menu">Αναζήτησε εκδήλωση: </li>
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
	  <li class="menu backg"> My patrorama 
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

<!------------------------------------------------------end of top menu-------------------------------------------------------------------------------------------------->


	

  
<!------------------------------------emfanish event----------------------------------------------------------------------------->


<div style="padding-top:200px"> <h2> <center style="font-size:100%;font-family:courier">Αποτελέσματα αναζήτησης </center> </h2> <br> </div>
 <div class="list-all">
	  
    <?php
		$i=0;
	    while($row=mysqli_fetch_assoc($result)) 
		{
            $id = $row['id'];
			$name = $row['name']; 
			$start_time = $row['start_time']; 
			$start_date = $row['start_date'];
			$place_name = $row['place_name']; 
			$picture = $row['picture'];
			$category = $row['category'];
			
			echo"<a href='http://localhost/final_responsive/event_page.php?key={$id}' style='text-decoration: none; color: black'>
					<div class='content' onMouseOver=show('div{$i}') onMouseOut=hide('div{$i}')>
						<div id='div{$i}' class='perigrafh'>
						<header>";
							echo"<h1>{$name}</h1>";
						echo"</header>
						</div>
					<div>
						<img id='img{$i}' class='image_size' src='{$picture}' />
					</div>
					<div class='upotitlos'>
						<p>Που:{$place_name}</p>
						<p>Πότε:{$start_date} at {$start_time}</p> 
						<p>Κατηγορία:{$category}</p>
						
					</div>
					</div>
				</a>";
		
		$i=$i+1;
		}
	?>
	
</div>

</body>

</html>