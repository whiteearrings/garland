<?php
$fileOne = "template.php";
$fileHandle = fopen($fileOne, 'w') or die("file could not be accessed/created");
$textIWantToInsert = "<h1>this is some text in my template.html file</h1>";
fwrite($fileHandle, $textIWantToInsert);
fclose($fileHandle);
//add chmod() ??
?>