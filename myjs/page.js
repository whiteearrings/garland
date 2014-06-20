stars=3;

function printStars(s)
{
	var str = '';
	for( i=0; i<10; i++ )
	{
		var st;
		st = '<span id="str' + i + '" class="glyphicon glyphicon-star'; 
		if( i > s ) st += '-empty';
		st += ' mystar"></span>';
		str += st;
	}
	document.getElementById("starcontainer").innerHTML = str;
	//console.log(str);
}

function over()
{
	var s = $(this).attr('id');
	s = parseInt(s[3]);
	printStars(s);
	$('.mystar').hover( over, out );
	set();
}

function  out()
{
	printStars(stars);
	$('.mystar').hover( over, out );
	set();
}

function clic()
{
	console.log("clicked");
	var s = $(this).attr('id');
	s = parseInt(s[3]);
	stars = s;
	set();
}

function set()
{
	$('.mystar').hover( over, out );
	$('.mystar').mousedown( clic );
}








$(document).ready(function(){
	printStars(stars);
	//$('.mystar').click( clic );
	set();
	//links();
		//console.log("ol");
});


//---------------------- Youtube --------------------------------------------------

function embed(id)
{
	var ob = document.getElementById("vid-container");
	ob.innerHTML = '<iframe id="you-vid" width="640" height="360" src="//www.youtube.com/embed/' + id + '" frameborder="0" allowfullscreen></iframe>';
	document.getElementById("you-overlay").style.display = "block";
	var iframe = document.getElementById("you-vid");
	iframe.postMessage('{"event":"command","func":"' + "playVideo" + '","args":""}', '*');
}

function removeEmbed()
{
	document.getElementById("you-overlay").style.display = "none";
	var iframe = document.getElementById("you-vid").contentWindow;
	iframe.postMessage('{"event":"command","func":"' + "pauseVideo" + '","args":""}', '*');
	document.getElementById("vid-container").innerHTML='';
}




