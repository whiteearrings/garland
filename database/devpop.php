<?php
	$dbhost = 'localhost';  
	$dbname = 'IGDB';  
	$m = new Mongo("mongodb://$dbhost");  
	$db = $m->$dbname;  
	$collection = $db->gamesc;
	$col=$db->devdb;
	$arr1=array();
	$arr2=array("Developer"=>true,"_id"=>false);
	$devcn=array();
	$cursor = $collection->find($arr1,$arr2);
	$i=0;
	foreach($cursor as $document) 
	{
		$var=json_encode($document);
		$var=explode(":",$var)[1];
		$var=str_replace('"', '', $var);
		$var=str_replace('}', '', $var);
		$var=str_replace('\n', '', $var);
	    if(!in_array($var,$devcn))
		{
			$devcn[$i]=$var;
			$i++;
		}
	}
	$ct=1;
	foreach($devcn as $k)
	{
		echo $k."<br>";
		$arr=array('dname'=>$k,"devid"=>"did".$ct);
		$cursor = $col->insert($arr);
		$ct++;
	}
	print_r($devcn);
?>