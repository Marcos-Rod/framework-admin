function addAnimated ( animatedId )
{

	var classAnimated = $( animatedId ).attr("data-animated");
	if( classAnimated == "") 
		classAnimated = "pulse";
	
	$( animatedId ).addClass( "animated" );
	$( animatedId ).addClass( classAnimated );
}
function removeAnimated ( animatedId )
{
	var classAnimated = $(  animatedId).attr("data-animated");
	$( animatedId  ).removeClass( "animated" );
	$( animatedId  ).removeClass( classAnimated );
}

function addAnimated_scroll ( animatedId )
{

	var classAnimated = $( "." + animatedId ).attr("data-animated");
	if( classAnimated == "") 
		classAnimated = "pulse";
	
	$(  "." + animatedId ).addClass( "animated" );
	$(  "." + animatedId ).addClass( classAnimated );
}
function removeAnimated_scroll ( animatedId )
{
	var classAnimated = $(  "." +  animatedId).attr("data-animated");
	$(  "." + animatedId  ).removeClass( "animated" );
	$(  "." + animatedId  ).removeClass( classAnimated );
}