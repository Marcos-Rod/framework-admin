//El ejemplo que aplique se copia en /js/usr.js

$().ready(function() {
//Cuando se necesita en un scroll
	$(window).scroll(function()
	{
		var class_effect = "image_focus"; //Cambiar por class de img que queremos con efecto
		if ($(this).scrollTop() > 50) 
			addAnimated_scroll( class_effect );
		else
			removeAnimated_scroll( class_effect );
	}); 

//Cuando se necesita en una clase particular
$(".image_focus").on({ //Cambiar por class de img que queremos con efecto
	 "mouseover" : function() {
		addAnimated( $(this) );
	  },
	  "mouseout" : function() {
		removeAnimated( $(this) );
	  }
});

//Cuando  necesitas aplicarlo en un hover X
	$('.imagen_focus').hover(function(){
		addAnimated( $(this) );
		return false;
    }, function(){
       removeAnimated( $(this) );
		return false;
	});

});

// Cuando necesitas aplicarlo en un hover X *Corregido ***Agregar en usr.js***
$(".image_effects").on({
	 "mouseover" : function() {
		$( this ).addClass( "pulse" );
	  },
	  "mouseout" : function() {
		$( ".image_effects" ).one( 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){ $(this).removeClass( "pulse" ); } );
	  }
});

// En index agregar en css y js

<link href="./libs/animate/css/animate.css" rel="stylesheet">

<script src="./libs/animate/js/animate.js"></script>

//clase en la imagen
class="image_effects animated"
