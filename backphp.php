<?php    
 
function gamepage($gname)
{
			$dbname = 'IGDB'; 
			$dbhost = 'localhost';  
			$m = new Mongo("mongodb://$dbhost");  
			$db = $m->$dbname; 
			$collection = $db->gamese; 
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
}
?>   