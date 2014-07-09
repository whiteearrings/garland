<?php

	 
    set_time_limit(0);
	$dbhost = 'localhost';  
	$dbname = 'IGDB';  
	$m = new Mongo("mongodb://$dbhost");  
	$db = $m->$dbname;  
	$collection = $db->games9;  
	$name=array();
	$aa=array("cost"=>false,"flipkartcost"=>false,"type"=>false,"_id"=>false);
	$cursor = $collection->find($name,$aa);
	foreach($cursor as $document) 
	{
		$name=json_encode($document);
	//	$name="{name:Grand Theft Auto V}";
		echo "1:".$name;
		$redir=explode(':', $name);
		
		if($redir[2])
		{
			//$name=substr($redir[2],0,-1);
			$name=substr($redir[1],0,-1).":".substr($redir[2],0,-1);
			$na=$name;
		}
		else
		{
			$name=substr($redir[1],0,-1);
			$na=$name;
		}
		$name=str_replace('"', "", $name);
		echo "2:".$name;
		$na=str_replace("","\"",$name);
		echo "<br> 3: ". $na;
		
	//	echo "RASH:".$n;*/
	    $name=str_replace(" ","+",$name);
		//if($name[0]='+')
			//$name = substr($name, 1);
		//echo "4:  ".$name;
		$part=explode('+', $name)[0];
		echo "<br>4: ".$part;
      $url = "http://en.wikipedia.org/w/index.php?title=Special:Search&search=".$name."&fulltext=Search&profile=default";
	  echo "<br>".$url;
	  $n=$part;
	  $u="http://www.wikipedia.org";
      $html= file_get_contents($url);
	  $dom = new DOMDocument();
      @$dom->loadHTML($html);
      $xPath = new DOMXPath($dom);
	  $array= array();
	  
	 // $array[0]= $xPath->query("/html/body/div[3]/div[3]/div[3]/div[2]/ul/li");
	 $output = $xPath->query("//a/@href[contains(/html/body/div[3]/div[3]/div[3]/div[2]/ul/li, $n)]");
	  //print_r($array[0]);
		$num=1;
	  	foreach($output as $e) 
		{
			$toinsert=array();
			if($num)
			{
					
					if(strpos($e->nodeValue,$n) && strpos($e->nodeValue,"wiki") && strpos($e->nodeValue,"game"))
		//		 if(strpos($e->nodeValue,"wiki"))
					{
						//echo "came here";
						echo "<br>".$u.$e->nodeValue . "<br>";
						$infourl = $u.$e->nodeValue;
						echo $infourl;
						$html= file_get_contents($infourl);
						$dom = new DOMDocument();
						@$dom->loadHTML($html);
						$xPath = new DOMXPath($dom);
						$array= array();
						$array[0]= $xPath->query("/html/body/div[3]/div[2]/div[4]/p[1]");
						$array[1]= $xPath->query("/html/body/div[3]/div[2]/div[4]/p[2]");
						$content="";
						//print_r($array[0]);
						for($i=0;$i<2;$i++)
						{
							foreach($array[$i] as $e) 
							{
										$content=$content.$e->nodeValue . "<br>";
										//echo "<br>".$contents."<br>";
							}
						}
						echo "Contents:".$content;
					$toinsert['content']=$content;
						for($i=3;$i<20;$i++)
						{
							$arr= $xPath->query("/html/body/div[3]/div[2]/div[4]/table/tr[".$i."]");
							foreach($arr as $e) 
							{
									//	echo "new:";
									$val=trim($e->nodeValue);
									if(strpos($val,'(s)')==true)
									{
											$sep=explode('(s)', $val);
									}
									else
									{
										$sep=explode(' ', $val);
									}
									if($sep[1])
									{
			//							echo $sep[0]." : ".$sep[1]. "<br>";
										//echo $e->nodeValue . "<br>";
										$toinsert[$sep[0]]=$sep[1];
									}
							}
						}
					$num=0;
					
		//				print_r($toinsert);
		     			echo  "++++++++++++++++++++++<br>";
						$arr=array('name'=>$na);
						$arr2=array('$set' => $toinsert);
						print_r($toinsert);
						$cursor = $collection->update($arr,$arr2);
		
					}	
					
				
			}
		}
		echo $name."<br>";
		
		}
?>