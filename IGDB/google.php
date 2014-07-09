<?php
		$name="Grand Theft Auto V";
		echo $name;
		
	/*	$redir=explode(':', $name);
		$name=substr($redir[1],0,-1);
		$name=str_replace('"', "", $name);
		echo $name;
		$na=$name;
	//	echo "RASH:".$n;*/
	    $name=str_replace(" ","+",$name);
		
     // $url = "https://www.youtube.com/results?search_query=".$name."+trailer";
	    $url="https://gdata.youtube.com/feeds/api/videos/-/GTA_5";
		
	  echo "<br>".$url;
	//  $n=$part;
	  $u="http://www.wikipedia.org";
      $html= file_get_contents($url);
	  //echo $html;
	  //$var=xmlrpc_decode ( $html);
	  $var = simplexml_load_string($html);
	 //	 echo $var;
	  foreach($var as $k=>$e)
	  {
			echo "$k : <br/>";
		  foreach($e as $y => $x)
			{
				$flag = false;
				if($y == 'link')
				{
					if($flag) break;
					echo $y."->";
					foreach($x->attributes() as $x1=>$x2)
						{
							//if($flag) break;
							if("href"==$x1	)
							{
							$flag=true;		
							echo split("=",split('&',$x2)[0])[1];
							break;
							}
							//echo "$x1 = $x2;	 ";
							//print_r( $x2 );
							//$flag=true;
						}
						//print_r($x);
					$flag=true;
					break;
						//echo $x->href	;
					echo "<br/>";
				}
			}
			echo "<br/>";
		//$title= $e->getAttribute("href");
		//echo $title;
	  }
	  /*
	 // $f=fopen("test.txt","w");
	  //fwrite($f,$html,100000);
	  $dom = new DOMDocument();
      @$dom->loadHTML($html);
      $xPath = new DOMXPath($dom);
	  $array= array();
	  $toinsert=array();
	  $myid="mngb";
	  $array[0]= $xPath->query("/html/body/party[contains($myId, @id)]");
	 //$output = $xPath->query("//a/@href[contains(/html/body/div[3]/div[3]/div[3]/div[2]/ul/li, '')]");
	  print_r($array[0]);
		$num=1;
	  	foreach($array[0] as $e) 
		{
			$i=$e->getAttribute("id");
			echo $i;
			
		}	*/
?>