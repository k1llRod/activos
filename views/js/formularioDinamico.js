$(function(){
	$('#adicionar').on('click',function(){
		console.log('click');
		//$('#clonar').clone().appendTo('#adi').append('<button class="btn btn-info sumador" id="boton_quitar" type="button"><i class="fa fa-close"></i></button>');
		//$('#clonar').clone().appendTo('#adi').find('i').attr('class','fa fa-close');
		$('#clonar').clone().appendTo('#adi').find('button').attr('id','boton_quitar').find('i').attr('class','fa fa-close');

		//$('#clonar, #adicionar').find('i').attr('class','fa fa-close');
		
		//var p = $('#clonar').find('i');
		//var i = $(this).find('i');
		//console.log('b: ',b);
		//i.attr('class','fa fa-close');	


	});

	$(document).on('click','#boton_quitar',function(){
		console.log('boton quitar');
		var raiz = $(this).parents().get(0);
		console.log('raiz',raiz);
		$(raiz).remove();
		//var parent = $(this).parents().get(0);
		//$(parent).remove();
	});
});

$(document).ready(function(){
	recargaLista();
	$('#lista1').change(function(){
		//console.log('funciona');
		recargaLista();
	});
})


function recargaLista(){

	$.ajax({
		url:'vista/ajax/gestorFalta.php',
		method:"POST",
		data:'falta='+$('#lista1').val(),
		success:function(r){
			$('#articulo').html(r);
			//console.log('r', r);
		}
	});
}


$(document).ready(function(){
	recargaListaActa();
	$('#lista2').change(function(){
		//console.log('funciona');
		recargaListaActa();
	});
})


function recargaListaActa(){

	$.ajax({
		url:'vista/ajax/gestorFalta.php',
		method:"POST",
		data:'falta='+$('#lista2').val(),
		success:function(r){
			$('#articuloActa').html(r);
			//console.log('r', r);
		}
	});
}


$(document).ready(function(){
	//recargaActa();
	$('#listaActa').change(function(){
		console.log($('#listaActa').val());
		recargaActa();

	});

})

function recargaActa(){
	
	
	var contenidoActa = $('#listaActa').val();

	$.ajax({
		url:'vista/ajax/gestorConfiguracion.php',
		method:"POST",
		data:'acta='+contenidoActa,
		success:function(r){
			
			//$('.editarActa').html(r);
			CKEDITOR.instances['ckeditors'].setData(r);
			console.log('imprime acta', r);
			console.log('valor ',contenidoActa);
		}
	});

}

$(document).ready(function(){
	//recargaInicial();
	$('#inicial_resolutivo').change(function(){
		console.log('articulo Inicial');
		recargaInicial();
	});
});

function recargaInicial(){

	var valor = $('#inicial_resolutivo').val();
	if(valor == 0){
		console.log('inicial_resolutivo');
		console.log('valor', valor);
	}else{	
		$.ajax({
		url:'vista/ajax/gestorConfiguracion.php',
		method:'POST',
		data:'auto='+valor,
		success:function(r){
			CKEDITOR.instances['ckeditor_autoInicial'].setData(r);
			console.log('imprime acta', r);
		}
	});

	}
	
}

$(document).ready(function(){
	//recargaResolutivo();
	$('#resolucion').change(function(){
		console.log('documento resolutivo');
		recargaResolutivo();
	});
});

function recargaResolutivo(){

	var valor = $('#resolucion').val();
	console.log('resolucion',valor);
	if(valor == 0){
		console.log('resolucion');
	}else{

		$.ajax({
		url:'vista/ajax/gestorConfiguracion.php',
		method:'POST',
		data:'resolucion='+valor,
		success:function(r){
			CKEDITOR.instances['ckeditor_autoInicial'].setData(r);
			console.log('imprime resolucion', r);
		}
	});

	}
	
}









