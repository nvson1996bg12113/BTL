$(".dropdown-mega-menu-sub").click(function(){
	var ul = $(this).parents("li").find("ul");
	var indexOfClass = ul.attr("class");
	if(indexOfClass.indexOf("open") > 0){
		ul.slideUp();
	}
	else{
		ul.slideDown();
	}
	ul.toggleClass("open");	
});

$(".dropdown-mega-menu-sub").click(function(){
	var a = $(this).parents("li");
	a.toggleClass("active");
});