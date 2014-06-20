$(document).ready(pageload);


function pageload()
{
  var xmlhttp;
  if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    }
  else
    {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
     
		var obj=JSON.parse(xmlhttp.responseText);
		console.log(obj);
		console.log(obj["name"]);
		document.getElementById("gname").innerHTML = obj["name"];
		document.getElementById("input-dev").innerHTML = obj["Developers"];
		document.getElementById("input-dev").innerHTML = obj["Developers"];
      }
    }
  name= "Call of Duty: Black Ops II";
  xmlhttp.open("GET","backphp.php?name="+name,true);
  xmlhttp.send();
  
}
