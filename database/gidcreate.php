<?php
	$page = file_get_contents('db2.json');
	$arr = explode("\n", $page);
	$arr1=array();
	$full="";
//	echo $arr[0];
	$i=1;
	foreach($arr as $val)
	{
		$id="{'gid':'gid".$i."',";
	//	preg_replace('/{/',$id,$arr[$i-1],1);
	   // $val[0]="";
	   $str = substr($val, 1);
		$t=$id.$str;
		$i++;
	//	echo $t;
		$full=$full.$t."\n";
		//echo "RASH:".$full;
//		break;
	}
	//echo $full;
	//echo $arr[0];
//	$pg=implode("",$arr);
	//echo $pg;
	file_put_contents('db3.json',$full);
?>
