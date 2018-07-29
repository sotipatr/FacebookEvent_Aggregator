<?xml version="1.0" encoding="UTF-8" ?>

<?php

//connect to database
$con = mysqli_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
mysqli_select_db($con,"facebookevents");
$con->query ('SET CHARACTER SET utf8'); 
$con->query ('SET COLLATION_CONNECTION=utf8_general_ci');

$checkbox=$_POST['check'];
$doc = new DomDocument('1.0');
$doc->formatOutput = true;
$doc->preserveWhiteSpace = true;
$doc->loadXML('
		<?xml-stylesheet type="text/css" href="Rss_Css.css"?>
        <rss version="2.0">
        <channel>
		<item>
		<description>
		</description>
		</item>
        </channel>
		</rss>
    ');
	
for($i=0;$i<sizeof($checkbox);$i++)
{
	if ($checkbox[$i]=='theater')
	{ 
	   $query="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%Organization%' OR category LIKE '%Arts%' OR category LIKE '%Theater%' OR category LIKE '%Education%' OR category LIKE '%Community%' ORDER BY start_date ASC, start_time ASC LIMIT 10";
	}
	elseif ($checkbox[$i]=='concert')
	{
		$query="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%Musician/Band%' OR category LIKE'%Concert%' ORDER BY start_date ASC, start_time ASC LIMIT 10 ";
	}
	elseif ($checkbox[$i]=='party')
	{
		$query="SELECT id,name,start_time,start_date,place_name,picture,category FROM events WHERE category LIKE '%party%' OR category LIKE '%Bar%' OR category LIKE '%Club%' OR category LIKE '%Local Business%' OR category LIKE '%Cafe%' OR category LIKE '%Radio Station%' ORDER BY start_date ASC, start_time ASC LIMIT 10";
	}
		
	$result=mysqli_query($con, $query);
	if(!mysqli_query($con,$query))
	{
		die('Error : ' . mysqli_error($con));
	}
	$num_rows = mysqli_num_rows($result);
	if ($num_rows>0)
	{
		while($row=mysqli_fetch_assoc($result)) 
		{
			$id= $row['id'];
			$name = $row['name']; 
			$start_time = $row['start_time']; 
			$start_date = $row['start_date'];
			$place_name= $row['place_name'];
			$url="http://localhost/final_responsive/event_page.php?key={$id}";
			
			
			$d="******What: ". $name." || When: ". $start_date." ". $start_time." || Where: ". $place_name."******"; 
			$descrNode = $doc->createElement('description');
			$descrNode->appendChild($doc->createTextNode($d));
				
			$itemNode = $doc->createElement('item');
			$itemNode->appendChild($descrNode);
			$channelNode = $doc->getElementsByTagName('channel')->item(0);
			$channelNode->appendChild($itemNode);
		}
	}
	else
	{
		echo "<h style='font-size:30px'> Nothing found!";
	}
}
mysqli_close($con);	
	
$xml_string = $doc->saveXML();
$xml = new SimpleXMLElement($xml_string);
echo $xml->asXML();

	



?>	