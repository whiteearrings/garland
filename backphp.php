<?php    

$dbhost = 'localhost';  
$dbname = 'IGDB'; 
$m = new Mongo("mongodb://$dbhost");  
$db = $m->$dbname; 
$collection = $db->games;  
$gname=$_GET["name"];
//echo $gname1 . "<br>";
//$gname= "Call of Duty: Black Ops II";
//echo  $gname . "<br>";
if($gname)
{
	$present=array('name'=>$gname);
	$npresent=array('_id'=>false);
	$cursor = $collection->find($present,$npresent);
	$i=0;
	foreach($cursor as $doc)
	{
	//	print_r($doc);
		//print $i++;
		return $doc;
	}

}
?>   