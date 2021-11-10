$(function(){
	$('#file').on('change',function(e){

		var archivoDetalle = e.target.files;
		var archivo = archivoDetalle[0];
		var archivoSize = archivo.size;
		var archivoTipo = archivo.type;

		var listaActa = $('#listaActa').val();

		if(listaActa != 0){
			$(".alerta").remove();		
		}else{
			$("#aviso_archivo").append('<div class="alert alert-warning text-center">Debe seleccionar un formato</div>');
			$("#actas").addClass("has-warning");
			preventDefault();

		}

		var idCadete = $('#idCadete').find('strong').attr('id');
		var ciCadete = $('#idPersonaCadete').find('strong').attr('id');
		var idUsuario = $('#id_usuario').find('p').attr('id');
		var ciUsuario = $('#id_usuario').find('p').attr('class');

		var idSancion = $('#sancion').find('div').attr('id');


		//console.log('archivo: ',archivo);
		//console.log('archiveSize: ',archivoSize);
		//console.log('archivoTipo: ',archivoTipo);


		if(Number(archivoSize) > 2000000){
			$('#adi').before('<div class="alert alert-warning text-center">El archivo excede el peso permitido</div>');
		}else{
			$('.alerta').remove();
		}

		if(Number(archivoSize) < 2000000 ){
			var datos = new FormData();
			datos.append('archivo',archivo);
			datos.append('listaActa',listaActa);
			
			datos.append('idCadete',idCadete);
			datos.append('ciCadete',ciCadete);
			datos.append('idUsuario',idUsuario);
			datos.append('ciUsuario',ciUsuario);
			datos.append('idSancion',idSancion);
		

			$.ajax({
				url:'vista/ajax/gestorArchivos.php',
				method:"POST",
				data:datos,
				cache: false,
				contentType: false,
				processData: false,
				
				success: function(respuesta){
					if(respuesta == 0){

					}else{
						console.log('respuesta: ',respuesta);

						swal({
						title: "OK!",
						text: "El archivo se subio correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false,
						},
						function(isConfirm){
							if(isConfirm){
								window.location = "index.php?action=sancion&id_sancion="+idSancion+"&id_cadete="+idCadete+"&ci="+ciCadete;
							}
						});

					}
				}

			})
		}
	})
})