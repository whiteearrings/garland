<?php
	function f()
	{
		$i=0;
		while(true)
		{
			if($i++ > 10) return;
			echo "this is $i";
			//sleep(1);
		}
	}
	
	f();
?>