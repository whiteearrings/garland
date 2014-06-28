<?php
		$name="GTA 5";
		echo $name;
		
	/*	$redir=explode(':', $name);
		$name=substr($redir[1],0,-1);
		$name=str_replace('"', "", $name);
		echo $name;
		$na=$name;
	//	echo "RASH:".$n;*/
	    $name=str_replace(" ","+",$name);
		
      $url = "https://www.youtube.com/results?search_query=".$name."+trailer";
	  echo "<br>".$url;
	//  $n=$part;
	  $u="http://www.wikipedia.org";
      $html= file_get_contents($url);
	 // $f=fopen("test.txt","w");
	  //fwrite($f,$html,100000);
	  $dom = new DOMDocument();
      @$dom->loadHTML($html);
      $xPath = new DOMXPath($dom);
	  $array= array();
	  $toinsert=array();
	  $array[0]= $xPath->query("/html/body");
	 //$output = $xPath->query("//a/@href[contains(/html/body/div[3]/div[3]/div[3]/div[2]/ul/li, '')]");
	  print_r($array[0]);
		$num=1;
	  	foreach($array[0] as $e) 
		{
			//$i=$e->getAttribute("id");
			//echo $i;
			foreach($e->getElementsByTagName('div') as $trs)
				echo $trs->getAttribute("id")."<br/>";
		}	
?>