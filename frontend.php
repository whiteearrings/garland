<?php
	$gname=$_GET['name'];
	echo $gname;
	$gname=str_replace(" ","%20",$gname);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IGdb</title>

    <!--link href="config.json" rel="stylesheet"-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="mycss/templete.css" rel="stylesheet">
	<!-- Fonts -->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    
  <!------------------------My links--------------------->
  
  <!----------------------------------------------------->
    
  </head>
  <body>
  
  <!----------------------------------------------------->
	<!--#include file="header.html"-->

	<div id="header"></div>
	
	<div class="con-holder well" id="con-holder">
		
	</div>
  
  <!----------------------------------------------------->
  
    

	
  <!-----------------------My scripts-------------------->
	

	<script src="myjs/headerloader.js"></script>
	
  <!----------------------------------------------------->
	
	
	
	
	
	
    

	
	</script>
	<script>
		$('#con-holder').ready( function() 
		{
			$('#con-holder').load("page.php?name=<?php echo $gname ?>");
		})

	</script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>