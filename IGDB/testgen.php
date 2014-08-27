 <?php
    set_time_limit(0);
 // ini_set('max_execution_time', 200);
	$dbhost = 'localhost';  
	$dbname = 'IGDB';  
	$m = new Mongo("mongodb://$dbhost");  
	$db = $m->$dbname;  
	$collection = $db->fore;  
	$name=array("name"=>true);
	$cursor = $collection->find();
	//print_r($cursor);
//	$aa=array("cost"=>false,"flipkartcost"=>false,"type"=>false,"_id"=>false,$cont1=>false);
		foreach($cursor as $document) 
		{
			echo json_encode($document)."<br>";
		}
?>