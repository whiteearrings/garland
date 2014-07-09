<?php

	 $infourl = "http://www.wikipedia.org/wiki/Grand_Theft_Auto_5";
	  $u="http://www.flipkart.com";
      $html= file_get_contents($infourl);
	  $dom = new DOMDocument();
      @$dom->loadHTML($html);
      $xPath = new DOMXPath($dom);
	  $array= array();
	  $array[0]= $xPath->query("/html/body/div[3]/div[3]/div[4]/p[1]");
	  $array[1]= $xPath->query("/html/body/div[3]/div[3]/div[4]/p[2]");
	  print_r($array[0]);
	for($i=0;$i<2;$i++)
	{
		foreach($array[$i] as $e) 
		{
			
			
				echo $e->nodeValue . "<br>";
		}
	}
?>
