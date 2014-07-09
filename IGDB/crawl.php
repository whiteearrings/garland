<?php
					$dbhost = 'localhost';  
					$dbname = 'IGDB';  
					$m = new Mongo("mongodb://$dbhost");  
					$db = $m->$dbname;  
					$collection = $db->games;  
    //  SELECT STARTING PAGE
      $url ="http://en.wikipedia.org/wiki/Grand_Theft_Auto_5";
	//	$url = 'http://www.flipkart.com';
      $html= file_get_contents($url);

     // GET ALL THE LINKS OF EACH PAGE

         // create a dom object

            $dom = new DOMDocument();
            @$dom->loadHTML($html);

         // run xpath for the dom

            $xPath = new DOMXPath($dom);
			$array= array();
		  $array[0] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div/h1");
		  $array[1] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div[2]/div/div/div[1]/span[1]");
		  $array[2] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div[2]/div/div/div[1]/div");
		  $array[3] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div/div[1]");
	//	  $array[4] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div/div/div/div/span");
		//  $array[5] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div/div/div/div");
		  
		//  $elements = $xPath->query("/html/body/div/");
		$fields=array("name","cost","flipkartcost","type");
		$toinsert=array();
		  print("<br>");
	for($i=0;$i<4;$i++)
	{
		  //print_r ($array[$i]);
			$t=1;
    foreach($array[$i] as $e) 
	{
		
		//	echo "came here";
			if($t)
			{
				$val=trim($e->nodeValue);
				echo $i." : ".$e->nodeValue. '</br>';
				$t=0;
				$toinsert[$fields[$i]]=$val;
			}
	}
	
	}
	  print_r($toinsert);
	  $cursor = $collection->insert($toinsert);

         
 ?>