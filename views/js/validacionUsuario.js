$('#tipo').on('change',function(){
	var resultado = $('#tipo option:selected').val();

	if(resultado == 0){
		console.log('tipo ',resultado);
		$('#codigo_cadete').prop('disabled',true);
		$('#paralelo').prop('disabled',true);
		$('#cargo_estudiante').prop('disabled',true);
		$('#anio_cursado').prop('disabled',true);
	}
	if(resultado == 'administrador'){
		

		
		$('#paralelo').prop('disabled',true);
		$('#codigo_cadete').prop('disabled',true);
		$('#cargo_estudiante').prop('disabled',true);
		$('#anio_cursado').prop('disabled',true);

	}
	if(resultado == 'estudiante'){
		$('#cargo').prop('disabled',true);
		$('#area').prop('disabled',true);
		$('#paralelo').prop('disabled',false);
		$('#codigo_cadete').prop('disabled',false);
		$('#cargo_estudiante').prop('disabled',false);
		$('#anio_cursado').prop('disabled',false);
	}
	
	
});






// SUBIR ARCHIVO

$('#documento_probatorios').change(function(){
	archivo = this.files[0];
	archivoSize = archivo.size;

	if(Number(archivoSize) < 2000000 ){
		$('#aviso_archivo').before('<div class="alert alert-warning alerta text-center">Supera el tamaño permitido 2MB</div>');

	}else{
		$('.alerta').remove();
	}

	archivoType = archivo.type;
	//console.log('tipo de archivo ',archivoType);
	if(archivoType == 'image/jpeg' || archivoType == 'image/png' || archivoType =="application/vnd.openxmlformats-officedocument.wordprocessingml.document"  ){
		$('.alerta').remove();
	}
	else{
		$('#aviso_archivo').before('<div class="alert alert-warning alerta text-center">El archivo debe ser WORD o imagen</div>');
	}

	if(Number(archivoSize) < 2000000 && archivoType == 'image/jpeg' || archivoType == 'image/png' || archivoType =="application/vnd.openxmlformats-officedocument.wordprocessingml.document"  ){


		var datos = new FormData();

		datos.append('archivo', archivo);
		datos.append('tipo',archivoType);
		/*

		$.ajax({
			url:'vista/ajax/gestorArchivos.php',
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){
				$('#aviso_archivo').before('<img src="vista/images/status.gif" id="status" >');
			},
			success: function(respuesta){
				console.log('respuesta',respuesta);
			}
		})
		*/
	}
	//console.log('archivo', imagen.size);

})