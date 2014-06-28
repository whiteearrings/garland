function links(name)
{
	$("#link-review").click(function(){$('#con-holder').load("review.php"+name)});
	$("#link-description").click(function(){$('#con-holder').load("desc.php"+name)});
	$("#link-main").click(function(){$('#con-holder').load("page.php"+name)});
}


function getName()
{
	name=location.search;
//	console.log(name);
//	links(name);
	return name;
}

$(document).ready(function(){
	name=getName();
	links(name);
});