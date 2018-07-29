<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">
<head>
  <title>Administrator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <script>
	
  function checkUrl(url){
	 
		$access_token = "?access_token=391620514343626|cfnfDZK9pPhaBMP9rCkmNIkeDFo";
		var graph="https://graph.facebook.com/"+ url.substr(url.lastIndexOf('/') + 1)+$access_token;

		$.ajax({
			type: 'HEAD',
			url: graph,
			success: function() {
				graph="https://graph.facebook.com/"+ url.substr(url.lastIndexOf('/') + 1);
				showInfo(graph);
			},
			error: function() {
				showInfo("");
			}            
		});
  }


  function showInfo(str) {
	  
	if (str.length==0) { 
		document.getElementById("txtHint").innerHTML="Λάθος ιστοσελίδα!";
		return;
	} else {
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				
			}
		}
	xmlhttp.open("GET","facebook_page_info.php?link="+str,true);
	xmlhttp.send();	
			}    
  }
  
  function store() {
	  
	var xmlhttp;
	if (window.XMLHttpRequest){
		
		xmlhttp=new XMLHttpRequest();
	  }
	else {
	  
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function(){
		
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		  
			document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","store_facebook_events.php",true);
	xmlhttp.send();
  }
  
  function diagrafh(){
	  
	var xmlhttp;
	if (window.XMLHttpRequest){
		
		xmlhttp=new XMLHttpRequest();
	  }
	else{
		
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function(){
		
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		  
		document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","delete_info.php",true);
	xmlhttp.send();
  }
  
  function diagrafh_page(str){
	  
		if (str.length==0) { 
			document.getElementById("delete").innerHTML="";
			return;
		} else {
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("delete").innerHTML=xmlhttp.responseText;
					
				}
			}
		xmlhttp.open("GET","delete_facebook_page.php?onomasia="+str,true);
		xmlhttp.send();	
				}    
	}	
	
  function ananewsh(str){
	  
		if (str.length==0) { 
			document.getElementById("ananewsh").innerHTML="";
			return;
		} else {
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("ananewsh").innerHTML=xmlhttp.responseText;
					
				}
			}
		xmlhttp.open("GET","ananewsh_event.php?event="+str,true);
		xmlhttp.send();	
				}    
  }
	
	
  function on_demand(){
	
	var xmlhttp;
	if (window.XMLHttpRequest){
		
	  xmlhttp=new XMLHttpRequest();
	  }
	else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function(){
		
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("on_demand").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","ananewsh_cron_job.php",true);
	xmlhttp.send();
  }

  function logoff(){
	window.location="http://localhost/final_responsive/index.php";
  }

  </script>
  
  <style>
   
   div.col-sm-9 div {
    font-size: 28px;
  }
  </style>
  
  </head>
  

<body style='padding-left:0px;'>

<nav class="navbar navbar-inverse">
  <div class="container-fluid" style='background-color:#6A6B6B'>
    <div class="navbar-header">
      <p class=""  style='font-family: Roboto, sans-serif;font-size:120%; padding-top:12px;color:#fff'>Admin</p>
    </div>
	
      <ul class="nav navbar-nav">
        <li><a href="#section1" style='font-family: Roboto, sans-serif;font-size:110%;'}>Εισαγωγή Σελίδας</a></li>
        <li><a href="#section2" style='font-family: Roboto, sans-serif;font-size:110%;'>Διαγραφή Σελίδας</a></li>
        <li><a href="#section3" style='font-family: Roboto, sans-serif;font-size:110%;'>Aνανέωση Event</a></li>
        <li><a href="http://localhost/final_responsive/index.php" style='font-family: Roboto, sans-serif;font-size:110%;'>Έξοδος</a></li>
      </ul>

  </div>
</nav>
  
<div class="container" style='background:#ECECE8;'>
  <div class="row" >

    <div class="col-sm-9">
		<div id="section1">    
			<h3><strong style='font-family: Roboto, sans-serif'>Εισαγωγή Σελίδας</strong></h3>
			<form class="form-horizontal" role="form">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="myInput" style='font-family: Roboto, sans-serif'><h5>Facebook Page:</h5></label>
				 <div class="col-sm-10">
					<div class="input-group">
						  <input type="text" name="enter" class="form-control" placeholder="Enter a Facebook link" value="" id="url"/>
						  <span class="input-group-btn">
							<input type="button"  class="btn btn-default" style='font-family: Roboto, sans-serif;' value="ΟΚ" OnClick="input()"/>
						  </span>
						  <script type="text/javascript">
							   var page = document.getElementById('url');
							   function input() {
								   checkUrl(page.value);
							   }
						  </script>
					</div>
					<h5 style='font-family: Roboto, sans-serif'>Αποθήκευση στην βάση?</h5>
					<button type="button" class="btn btn-danger" onclick="store()"style='font-family: Roboto, sans-serif;'>Ναι</button>
					<button type="button" class="btn btn-danger" onclick="diagrafh()"style='font-family: Roboto, sans-serif'>Όχι</button>
					<div id="txtHint"></div>
					
					<div id="myDiv1"></div>
					<div id="myDiv2"></div>
				</div>
			  </div>
			</form>
		</div>

		
        <div id="section2"> 
			<h3><strong style='font-family: Roboto, sans-serif'>Διαγραφή Σελίδας</strong></h3>
			<label><h5 style='font-family: Roboto, sans-serif'>Όλες οι ιστοσελίδες:</h5></label>
			<a  href="facebook_pages_table.php" style='font-family: Roboto, sans-serif'>Εδώ</a>
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label class="control-label col-sm-2" for="myInput2"><h5 style='font-family: Roboto, sans-serif'>Ιστοσελίδα:</h5></label>
					<div class="col-sm-10">		
							<div class="input-group">
								<input type="text" name="enter" class="form-control" placeholder="Enter name of facebook page" value="" id="name"/>
								<span class="input-group-btn">
									<input type="button" class="btn btn-default" value="OK" OnClick="input_name()"/>
								</span>
								<script type="text/javascript">
								   var page_name = document.getElementById('name');
								   function input_name() {
									  diagrafh_page(page_name.value);
								   }
								</script>
							</div>
							<div id="delete"></div>
					</div>
				</div>
			  </form>
		</div>
		
		
           
		<div id="section3" >         
			<h3><strong style='font-family: Roboto, sans-serif'>Aνανέωση Event</em></strong></h3>
			<label><h5 style='font-family: Roboto, sans-serif'>Όλα τα event:</h5></label>
			<a  href="facebook_events_table.php" style='font-family: Roboto, sans-serif'>Εδώ</a>
			<form class="form-horizontal" role="form">
				 <div class="form-group">
					<label class="control-label col-sm-2" for="myInput3"><h5 style='font-family: Roboto, sans-serif'>Όνομα Event:</h5></label>
					<div class="col-sm-10">
						<div class="input-group">
								<input type="text" name="enter" class="form-control" placeholder="Enter name of event" value="" id="event"/>
								<span class="input-group-btn">
									<input type="button" class="btn btn-default" value="OK" OnClick="event_name()"/>
								</span>
								<script type="text/javascript">
								   var e_name = document.getElementById('event');
								   function event_name() {
									  ananewsh(e_name.value);
								   }
								</script>
							</div>
						<div id="ananewsh"></div>
					</div>
				</div>
			 </form>
			 <label style='padding-left:0px'><h5 style='font-family: Roboto, sans-serif'>Aνανέωση όλων των events:</h5></label>
			 <button type="button" class="btn btn-info" onclick="on_demand()"style='font-family: Roboto, sans-serif;'>Eδώ</button>
			 <div id="on_demand"></div>
		  </div>
		  
    </div>
  </div>
</div>
</body>

</html>