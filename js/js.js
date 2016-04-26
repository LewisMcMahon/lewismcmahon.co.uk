function workBoxSizeSet(){
	//resixe the work boxes and fill the text
	$(".work-header").each(function (index) {
		//set the work header
		$(this).height($(this).width() * 0.5);

		//set the work header overlay (it must be set not just 100% for text fill)
		$(".work-header-overlay",this).height($(this).height());
		$(".work-header-overlay",this).width($(this).width());
		$(".work-header-overlay h3",this).css("line-height",$(this).height()+"px");
	});
	$(".work-header-overlay h3").fitText(1.5);
}

$( document ).ready(function() {
	workBoxSizeSet()
});

$( window ).resize(function() {
	workBoxSizeSet()
});