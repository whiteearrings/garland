<?php

//$query = "html/body/div/div[2]/div/div/div/div[2]/div[2]/div/div[2]/div[5]/div[2]/div/div/div/div/a";
$url3 = "http://www.flipkart.com/games/~new-releases/pr?sid=4rr,tg9&otracker=hp_nmenu_sub_books-media_0_New%20Releases#jumpTo=0|40";
	//	$url3 = 'http://www.flipkart.com';
      $html= file_get_contents($url3);
            $dom = new DOMDocument();
            @$dom->loadHTML($html);
            $xPath = new DOMXPath($dom);
			$entries = $xPath->query("/html/body/div/div[2]/div/div/div/div[2]/div[2]/div/div[2]/div[5]/div[2]/div/div/div/div/a");
			print_r($entries);
			foreach ($entries as $entry) 
			{
//   echo "Name: " . $entry->nodeValue;
			echo "Found: " . $entry->getAttribute("href")."<br>";
			}
?>