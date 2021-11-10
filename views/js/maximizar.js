$('.maximizar').click(function(){
	//console.log('Funciona',$(this).parent().parent().parent().parent());
	$(this).parent().parent().parent().parent().removeClass().addClass('col-md-12');
	//$('#ventana_texto').removeClass().addClass('col-md-12');
	
});

$('.minimizar').click(function(){
	//console.log('minimizar');
	$(this).parent().parent().parent().parent().removeClass().addClass('col-md-6');
	//$('#ventana_texto').removeClass().addClass('col-md-6');
});


$('.desplegar_botones').click(function(){
	//console.log($(this).parent().find('tr.estado_botons',this));
	$(this).next('tr').toggle('slow');
	//$(this).parent().find('tr.estado_boton',this).toggle();
});