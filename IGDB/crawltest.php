<?php
					//ini_set('max_execution_time', 300);
					set_time_limit(0); 
					$url3 =  "http://www.flipkart.com/toys/puzzles-board-games/card-games/pr?sid=mgl,qet";
					$u = "http://www.flipkart.com"; 
					$html= file_get_contents($url3);
					$dom = new DOMDocument();
					@$dom->loadHTML($html);
					$xPath = new DOMXPath($dom);
					$entries = $xPath->query("/html/body/div/div[2]/div/div/div/div[2]/div[2]/div/div[2]/div[5]/div[2]/div/div/div/div/a");
					print_r($entries);
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
						$array[3] = $xPath->query("/html/body/div/div[2]/div/div/div[4]/div/div/div[3]/div/div[1]");
	
		
						print("<br>");
						for($i=0;$i<4;$i++)
						{
		 
							$t=1;
							foreach($array[$i] as $e) 
							{
			
								//	echo "came here";
								if($t)
								{
									echo $i." : ".$e->nodeValue. '</br>';
									$t=0;
								}
							}
	
						}
					}
	?>