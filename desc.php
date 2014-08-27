<?php
require "backphp.php";
$name=$_GET['name'];
$obj=gamepage($name);
//echo "<span >". json_encode ($obj) ."</span>";

?>

<link href="mycss/page.css" rel="stylesheet">
<link href="mycss/review.css" rel="stylesheet">


<div class="row">
	
	<div class="col-md-3 col-sm-3 col-lg-3 myleft">	
		
		<label>
		<img class="game-dp" src="resource/Images/GTA5.jpg"></img>
		<!--span>GTA 5</span-->
		</label>
		
	</div>
	
	<div class="col-md-9 col-sm-9 col-lg-9 ">
	
				
		<ul class="nav nav-pills navbar-right level1">
		  <li id="link-main" ><a href="#">Main</a></li>
		  <li id="link-description" class="active"><a href="#">Description</a></li>
		  <li id="link-review" ><a href="#">Reviews</a></li>
		  <li id="link-lorem" ><a href="#">Lorem</a></li>
		</ul>


		<!--Star and Name-->
		<div class="row">	
			<!--Name-->
			<h1 class="col-md-6 col-sm-6 col-lg-6" id="gname-review"> <?php echo $obj['name']; ?> </h1>
		</div>
		
		
		
		
		<br/>
		<!--Container for Content-->
		<div class="row" id="content">
			<div class="col-md-12 col-sm-12 col-lg-12" style="text-align:justify">
				
				<div class="panel panel-default">
				  <div class="panel-body">
					<p id="desmatter"> <?php echo $obj['content']; ?> </p>
				  </div>
				</div>
				
			</div>
			
		</div>
		
		
		
		
	</div>

		
	
</div>


<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->

<script src="myjs/links.js"></script>
