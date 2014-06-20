function links()
{
	$("#link-review").click(function(){$('#con-holder').load("review.html")});
	$("#link-desc").click(function(){$('#con-holder').load("desc.html")});
	$("#link-main").click(function(){$('#con-holder').load("page.html")});
}




$(document).ready(function(){
	links();
});