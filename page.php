<?php
require "backphp.php";
$name=$_GET['name'];
$obj=gamepage($name);
//echo "<span >". json_encode ($obj) ."</span>";

?>
<link href="mycss/page.css" rel="stylesheet">



<div class="row">
	
	<div class="col-md-5 col-sm-5 col-lg-5 myleft">	
		
		<label>
		
		<img class="game-dp" src="<?php echo $obj['image'];?>"></img>
		<!--span>GTA 5</span-->
		</label>
		
	</div>
	
	<div class="col-md-7 col-sm-7 col-lg-7 ">
	
		<!--Top right buttons>
		<div class="row">
			<div class="btn-group mypagemenu">
			  <button type="button" class="btn btn-default">Main</button>
			  <button type="button" class="btn btn-default">Reviews</button>
			  <button type="button" class="btn btn-default">Lorem</button>
			</div>
		</div-->
		
		
		
		<ul class="nav nav-pills navbar-right level1">
		  <li id="link-main"  class="active"><a href="#">Main</a></li>
		  <li id="link-description" ><a href="#">Description</a></li>
		  <li id="link-review"><a href="#">Reviews</a></li>
		  <li id="link-lorem" ><a href="#">Lorem</a></li>
		</ul>


		<!--Star and Name-->
		<div class="row">	
			<!--Star-->
			<div class="col-md-1 col-sm-1 col-lg-1">
				<h1 ><span class="glyphicon glyphicon-star bigstar"></span></h1>
				<span id="starvalue"><?php echo $obj['stars']; ?></span>
			</div>
			<!--Name-->
			<h1 class="col-md-9 col-sm-9 col-lg-9" id="gname"> <?php echo $obj['name'] ?></h1>
		</div>
		
		<!--Stars-->
		<div class="row">
			<h3 class="col-md-6 col-sm-6 col-lg-6" id="starcontainer">
			</h3>
			<div class="col-md-6 col-sm-6 col-lg-6">
				<?php
					$tempplat = split(",",$obj['Platform']);
					foreach($tempplat as $k=>$v)
					{
						echo '<span class="label plat">'.$v.'</span>';
					}
				?>
			</div>
			
		</div>
		
		
		<br/>
		<!--Container for Content-->
		<div class="row" id="content">
			<div class="col-md-9 col-sm-9 col-lg-9" style="text-align:justify">
			<?php
				foreach($obj as $k=>$v)
				{
					if($k != "name" && $k!="image" && $k!="video" && $k!="esrbrating" && $k!="Platform" && $k!="content"  && $k!="stars")
					{
						echo "<label class='info'> $k :  <span id='input-pub'><a href=''>".$obj[$k]."</a></span></label><br/>";
					}
				}
				
			?>
			</div> 
			
			<div class="col-md-3 col-sm-3 col-lg-3" >
				<img src="<?php echo "resource/ESRB/".$obj['esrbrating'].".jpg"; ?>" class="esrb"></img>
				<!--div class="col-md-12 col-sm-12 col-lg-12" >
					<img class="platformimg" src="images/Xbox-logo.png"/>
					<img class="platformimg" src="images/PS2-logo.png"/>
					<img class="platformimg" src="images/PS3-logo.png"/>
					<img class="platformimg" src="images/PS4-logo.png"/>
					<img class="platformimg" src="images/PC-logo.png"/>
				</div-->
			</div>
		</div>
		
		
		
		
	</div>

		
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="row thumbs">
				<?php
					foreach($obj['video'] as $k=>$v)
					{
						echo '	<div class="col-xs-6 col-md-4  thumb" onclick="embed(\''.$v.'\');">
							<a href="#" class="thumbnail">
							<img src="http://img.youtube.com/vi/'.$v.'/mqdefault.jpg"/>
							<img src="images/play.png" class="playoverlay" ></img>
							</a>
							</div> ';
					}
				?>
			</div>
		</div>
	</div>
	
	
</div>



<!-------------Youtube window-------------------------------------------->

<div id="you-overlay" class="you-overlay" style="display:none" onclick="removeEmbed();">
	<div id="vid-container" class="well" onclick = "return false">
		
	</div>
</div>

<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->

<script src="myjs/page.js"></script>
<script src="myjs/links.js"></script>
<!-- backend script -->
<script src="myjs/page-back.js"></script>
