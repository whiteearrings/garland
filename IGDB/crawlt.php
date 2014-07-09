 <?php

//	 ini_set('max_execution_time', 200);
	  set_time_limit(0); 
	  $dbhost = 'localhost';  
	  $dbname = 'IGDB';  
	  $m = new Mongo("mongodb://$dbhost");  
	  $db = $m->$dbname;  
	  $collection = $db->games1;  
      $url = "http://www.flipkart.com/games";
	  $u="http://www.flipkart.com";
      $html= file_get_contents($url);
	  $dom = new DOMDocument();
      @$dom->loadHTML($html);
      $xPath = new DOMXPath($dom);
	  $array= array();
	  $array[0]= $xPath->query("//a/@href[contains(., 'game')]");
	for($i=0;$i<1;$i++)
	{
		foreach($array[$i] as $e) 
		{
			
			
			   $URLS= file_get_contents($u.$e->nodeValue);
				$dom = new DOMDocument();
				@$dom->loadHTML($html);
				$xPath = new DOMXPath($dom);
				$output = $xPath->query("//a/@href[contains(., 'game')]");
				
				foreach($output as $o)
				{
					echo "new : " . $u.$o->nodeValue . "<br>";
					/* start crawl3 */
					$url3 =  $u.$o->nodeValue;
					$html= file_get_contents($url3);
					$dom = new DOMDocument();
					@$dom->loadHTML($html);
					$xPath = new DOMXPath($dom);
					$entries = $xPath->query("/html/body/div/div[2]/div/div/div/div[2]/div[2]/div/div[2]/div[5]/div[2]/div/div/div/div/a");
					print_r($entries);
					$fields=array("name","cost","flipkartcost");
				    //$toinsert=array();	
					foreach ($entries as $entry) 
					{
						$url1= $u.$entry->getAttribute("href");
						echo $url1;
						$html= file_get_contents($url1);
						$dom = new DOMDocument();
						@$dom->loadHTML($html);
						$xPath = new DOMXPath($dom);
						$array= array();
						$array[0] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div/h1");
						$array[1] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div[2]/div/div/div[1]/span[1]");
						$array[2] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div[2]/div/div/div[1]/div");
	//					$array[3] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div/div[1]");
	
					
						$toinsert=array();
						print("<br>");
						for($i=0;$i<3;$i++)
						{
		 
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
									if($toinsert)
									{
										print_r($toinsert);
										$cursor = $collection->insert($toinsert);
									}
									else
										echo "1not done <br>";
					}
												
				}
			
			}
	
		}
	  

         
 ?>