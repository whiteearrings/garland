  <?php

    //  SELECT STARTING PAGE
      $url = "http://www.flipkart.com/games";
	//	$url = 'http://www.flipkart.com';
      $html= file_get_contents($url);

     // GET ALL THE LINKS OF EACH PAGE

         // create a dom object

            $dom = new DOMDocument();
            @$dom->loadHTML($html);

         // run xpath for the dom

            $xPath = new DOMXPath($dom);
			$array= array();
			 $array[0]= $xPath->query("//a/@href[contains(., 'game')]");
		  print("<br>");
	for($i=0;$i<1;$i++)
	{
		  print_r ($array[0]);
			$t=1;
		$u="http://www.flipkart.com";
    foreach($array[$i] as $e) 
	{
			{
			echo "url : ".$u.$e->nodeValue."<br>";
			$URLS= file_get_contents($u.$e->nodeValue);
				$dom = new DOMDocument();
				@$dom->loadHTML($html);
				$xPath = new DOMXPath($dom);
				$output = $xPath->query("//a/@href[contains(., 'game')]");
				foreach($output as $o)
				{
					echo "new : " . $u.$o->nodeValue . "<br>";
				}
			}
	}
	
	}
	  

         
 ?>