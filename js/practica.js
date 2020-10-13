$( document ).ready( function (){
	$( "#btn-enviar" ).click ( function( e ){
		$( "#resultado" ).load( "practica2.php?objetos=" + 
		$( "#cantidad" ).val() );
	} )
} );

