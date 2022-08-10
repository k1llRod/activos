$(document).ready(function() {
    /* ASIGNACION DE FUNCIONARIOS */ 
    chargeGeneral();
    $("#select_employee").change(function(){
        console.log($("#select_employee").val());
        chargeGeneral();
    })

    chargeEspecifica();
    $("#location_general").change(function(){
        chargeEspecifica();
        console.log('especifico');
    })

    chargeArea();
    $("#location_especifica").change(function(){
        chargeArea();
        //console.log('area');
    })
    
    chargeTableAsignacion();
    $("#location_area").change(function(){
        chargeTableAsignacion();
        //console.log('table');
    })
   
    $("#createActa").click(function(){
        console.log('funciona 22');
        createActa();
    })

    /* ASIGNACION DE ACTIVOS FIJOS */
    $("#ciudad").change(function(){
        chargeUbicacionGeneral();
        console.log('CIUDAD');
    })

    $("#ubicacion_general").change(function(){
        charge_location_especifica();
        console.log("Ubicacion especifica : "+$('#ubicacion_general').val());
    })

    $("#location_especifica").change(function(){
        charge_location_area();
        console.log("Ubicacion area : "+$('#location_especifica').val());
    })
    
    $("#location_areas").change(function(){
        charge_funcionario();
        console.log("Ubicacion area : "+$('#location_area').val());
    })
    
    $("#id_employee").change(function(){
        datos = {'employee':$("#id_employee").val(), 
            'area':$('#location_area').val()
            }
        console.log("VALOR ASIGNACION");
        $.ajax({
            url:'views/ajax/assignment.php',
            method:"POST",
            data:{'employee': $("#id_employee").val(),
                    'area': $('#location_area').val()},
            success:function(r){
                console.log(r);
                $("#id_asig").val(r);
                //console.log(r);
                //$('#llenarActivosFijosAsignacion').html(r);
            }
        });
        
    })
    $("#button").click(function(){
        console.log('funciona 11');
        id = $("#id_employee").val();
        name_funcionario = $("#id_employee option:selected").text();
        console.log(name_funcionario);
        $("#funcionario").val(name_funcionario);
        $("#id_funcionario").val(id);
        //$('#id_asig').val(id_location_area); 
        //console.log(id_location_area);
    })

    //table_account_asset();
    function chargeTableAccountAsset(){
        console.log('Asignacion activo');
        $.ajax({
            url:'views/ajax/account_asset.php',
            method:"POST",
            data:{'id_function':1 },
            success:function(r){
                console.log('Asignacion activo');
                //console.log(r);
                $('#llenarActivosFijosAsignacion').html(r);
            }
        });
    }
    chargeTableAccountAsset();
    //console.log("prueba");
    $("#create_account_assignment").click(function(){
        var id_assignment_asset = $("#id_assignment_asset").val();
        datos = {
            'create_assignment': 1,
            'funcionario': $("#id_funcionario").val(),
            'id_activos': $("#id_assignment_asset").val(),
            'codigo_acta': $("#codeActa").val(),
            'date_assignment': $("#date_assignment_asset").val(),
            'user': $("#user").val(),
            'id_asig': $("#id_asig").val()
        };
        $.ajax({
            url:'views/ajax/assignment.php',
            method:"POST",
            data: datos ,
            success:function(r){
                console.log(r);
                console.log('Creacion de Asignacion activo');
                $("#actaPdf").attr("href","tcpdf/examples/acta_asignacion.php?ids="+$('#id_assignment_asset').val()+'&id_funcionario='+$('#id_funcionario').val()+'&fecha='+$('#date_assignment_asset').val()+'&codeActa='+$('#codeActa').val());
                $("#actaPdf").removeClass("disabled");
                swal({
                    title: "OK!",
                    text: "Creacion de activo creada!!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false,
                    });
            },
            error:function(){
                swal({
                    title: "Error!",
                    text: "Error al asignar el activo!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false,
                    });
            }
        });
        console.log(id_assignment_asset);
    });

    
    
})
/*TREE ACTIVOS FIJOS ASIGNACION*/ 

/* ASIGNACION DE ACTIVOS FIJOS */
function chargeUbicacionGeneral(){
    $.ajax({
        url:'views/ajax/assignment.php',
        method:"POST",
        data:{'id_ciudad':$('#ciudad').val()},
        success:function(r){
            console.log(r);
            $('#ubicacion_general').html(r);
        
        }
    });
}
function asset_state(){
    $.ajax({
        url:'views/ajax/account_asset.php',
		method:"POST",
		data: 'state=state',
		success:function(r){
             console.log(r);
             $('#inputEstado').append(r);
           
        },
       
    });
}

function unidad(){
    $.ajax({
        url:'views/ajax/account_asset.php',
		method:"POST",
		data: 'unidad=unidad',
		success:function(r){
             console.log(r);
             $('#inputUnidad').append(r);
           
        },
       
    });
}

$(document).on('click',".btnEditAccountAsset",function(){
    fila = $(this).closest("tr");
    id_asset = parseInt(fila.find('td:eq(0)').text());
    codigo = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    serie = fila.find('td:eq(3)').text();
    estado = fila.find('td:eq(4)').text();
    unidad_medida = fila.find('td:eq(5)').text();
    fecha_registro = fila.find('td:eq(6)').text();
    codigo_registro = fila.find('td:eq(7)').text();
    $("#codigo").val(codigo_registro);
    $("#descripcion").val(descripcion);
    $("#serie").val(serie);
    $("#estado").val(estado);
    $("#unidad_medida").val(unidad_medida);
    $("#fecha_registro").val(fecha_registro);
    $("#codigo_registro").val(codigo_registro);
    $.ajax({
        url:'views/ajax/account_asset.php',
		method:"POST",
		data:{'id_asset':id_asset},
		success:function(r){
            console.log(r);
		    $('#modalEditAccountAsset').html(r);
            asset_state();
            unidad();
            $("#ver_historial").attr('href', "index.php?action=edit_account_asset&id_activos="+id_asset);
        }
    });
    console.log(id_asset);
});
$('#formEditAccountAsset').submit(function(e){
    e.preventDefault();
    var table = $("#ver_account_asset").DataTable();
    id_activo = $.trim($("#id_activo").val());
    codigo = $.trim($('#codigo').val());
    descripcion = $.trim($('#descripcion').val());
    serie = $.trim($('#serie').val());
    estado = $.trim($('#inputEstado').val());
    unidad_medida = $.trim($('#inputUnidad').val());
    observaciones = $.trim($('#observaciones').val());
    fecha_registro = $.trim($('#fecha_registro').val());
    codigo_registro = $.trim($('#codigo').val());
    console.log('LISTADO DE ACTIVOS FIJOS');
    $.ajax({
        url:'views/ajax/account_asset.php',
		method:"POST",
		data:{'id_activo':id_activo, 'codigo':codigo, 'descripcion': descripcion, 'serie': serie, 'estado': estado, 
                'unidad_medida': unidad_medida, 'observaciones': observaciones,'fecha_registro': fecha_registro, 'codigo_registro': codigo_registro},
		success:function(r){
            console.log(r);
            
            swal({
                title: "OK!",
                text: "Activo actualizado!!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false,
                });
            table.ajax.reload(null, false);
             },
        error:function(){
            swal({
                title: "Error!",
                text: "Error al actualizar el activo!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false,
                });
        }
        
    });

});

function chargeGeneral(){
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data:'id_employee='+$('#select_employee').val(),
		success:function(r){
            console.log(r);
			$('#location_general').html(r);
        }
    });
}

function chargeEspecifica(){
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data:{'id_general':$('#location_general').val(), 'id_emp':$('#select_employee').val()},
		success:function(r){
            console.log(r);
			$('#location_especifica').html(r);
           
        }
    });
}
function charge_location_especifica(){
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data:{'id_gral':$('#ubicacion_general').val()},
		success:function(r){
            console.log(r);
			$('#location_especifica').html(r);
           
        }
    });
}
function charge_location_area() {
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data:{'id_especifica': $("#location_especifica").val()},
		success:function(r){
			$('#location_areas').html(r);
        }
    });
}

function chargeArea() {
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data:{'id_em':$('#select_employee').val(), 'id_especifica':$("#location_especifica").val()},
		success:function(r){
			$('#location_area').html(r);
        }
    });
}

function charge_funcionario() {
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data:{'id_area':$('#location_areas').val()},
		success:function(r){
            console.log(r);
			$('#id_employee').html(r);
        }
    });
}

function chargeTableAsignacion() {
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data:{'id_emple':$("#select_employee").val(), 'id_areas':$('#location_area').val() },
		success:function(r){
            console.log(r);
			$('#chargeAsignaciones').html(r);
        }
    });
}


function createActa() {
    datos = {'idAsignarActivo':$("#idAsignarActivo").val(), 
            'codeActa':$('#codeActa').val(),
            'datepicker':$('#datepicker').val(),
            'id_employee':$('#select_employee').val(),
            'user':$('#user').val()}
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data: datos,
		success:function(r){
			chargeTableAsignacion();
            $("#actaPdf").attr("href","tcpdf/examples/acta_asignacion.php?ids="+$("#idAsignarActivo").val()+'&id_funcionario='+$("#select_employee").val()+'&fecha='+$('#datepicker').val()+'&codeActa='+$('#codeActa').val());
            $("#actaPdf").removeClass("disabled");
            console.log("FUNCIONA ASIGNACION: ", r);
            
            swal({
                title: "OK!",
                text: "Acta creada!!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false,
                });
        },
        error:function(){
            swal({
                title: "Error!",
                text: "Error al registrar un nuevo funcionario!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false,
                });
        }
    });
}
function create_assignment_asset(){
    datos = {'funcionario':$("#funcionario").val(), 
            'id_assignment_asset':$('#id_assignment_asset').val(),
            'codeActa':$('#codeActa').val(),
            'date_assignment_asset':$('#date_assignment_asset').val(),
            'user':$('#user').val()}
    $.ajax({
        url:'views/ajax/assignment.php',
		method:"POST",
		data: datos,
		success:function(r){
			chargeTableAsignacion();
            $("#actaPdf").attr("href","tcpdf/pdf/actas_asignacion.php?ids="+$("#idAsignarActivo").val()+'&id_funcionario='+$("#select_employee").val()+'&fecha='+$('#datepicker').val()+'&codeActa='+$('#codeActa').val());
            $("#actaPdf").removeClass("disabled");
            console.log("FUNCIONA ASIGNACION: ", r);
            
            swal({
                title: "OK!",
                text: "Acta creada!!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false,
                });
        },
        error:function(){
            swal({
                title: "Error!",
                text: "Error al registrar un nuevo funcionario!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false,
                });
        }
    });
}

function table_account_asset(){
    console.log('TABLA de activos fijos')
    $.ajax({
        url:'views/ajax/account_asset.php',
		method:"POST",
		data: 'search=asd',
		success:function(r){
			$('#body_table').html(JSON.parse(r));
            console.log("FUNCIONA ASIGNACION: ", JSON.parse(r));
            $("#ver_account_asset").DataTable();
        },
        error:function(){
            swal({
                title: "Error!",
                text: "Error al llenar la tabla!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false,
                });
        }
    });
}



//asset_state();


