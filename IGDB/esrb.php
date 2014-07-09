<?php
	set_time_limit(0); 
		$name="GTA 5";
		echo $name;
	    $name=str_replace(" ","%20",$name);
		
      $url = "http://www.esrb.org/ratings/search.jsp?searchType=title&titleOrPublisher=".$name;
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
	  //$array[0]= $xPath->query("/html/body/table/tbody/tr[4]/td/duv/form/table/tbody/tr/table/tbody/tr/td[5]/img");
	    //$toinsert=array();
	  $array[0]= $xPath->query("/html/body/table/tbody/tr[4]/td/duv/form/table/tbody/tr/table/tbody/tr/td[5]/img");
	 //$output = $xPath->query("//a/@href[contains(/html/body/div[3]/div[3]/div[3]/div[2]/ul/li, '')]");
	  print_r($array[0]);
		$num=1;
	  	foreach($array[0] as $e) 
		{
			//$i=$e->getAttribute("id");
			//echo $i;
		//	foreach($e->getElementsByTagName('div') as $trs)
				echo $e->getAttribute("src")."<br/>";
		}	
?>