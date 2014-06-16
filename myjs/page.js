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
		//console.log("ol");
});
