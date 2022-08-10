$(document).ready(function() {
    //ASIGNACIONES DE ACTAS
    var table = $('#ver_asignaciones').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'selectAll',
            'selectNone'
        ],
        
        select: {
            style: 'multi'
        }
    });
    
    $('#ver_asignaciones tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
    
    $('#button').click(function(){
        var n = table.rows('.selected').ids().length;
        var ids = table.rows('.selected').ids();
        var id_funcionario = $('#select_employee').val();
        var id_location_area = $('#location_area').val();
        var valor='';
        valor = ids[0];
        for(i=1; i<n; i++) {
            valor = valor+ ',' + ids[i];
        }
        console.log(valor);
        $('#idAsignarActivo').val(valor);
        console.log(id_funcionario);
        $('#funcionario').val(id_funcionario);
        
    });
    


    //ASIGNACIONES DE Activos
    var table = $('#ver_activos_fijos').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'selectAll',
            'selectNone'
        ],
        
        select: {
            style: 'multi'
        }
    });
    $('#ver_activos_fijos tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
    
    $('#button').click(function(){
        var n = table.rows('.selected').ids().length;
        var ids = table.rows('.selected').ids();
        var id_funcionario = $('#select_employee').val();
        var valor='';
        valor = ids[0];
        for(i=1; i<n; i++) {
            valor = valor+ ',' + ids[i];
        }
        console.log(valor);
        $('#idAsignarActivo').val(valor);
        console.log(id_funcionario);
        $('#funcionario').val(id_funcionario); 
    });

    $("#create_account_assignment").click(function(){
        var id_assignment_asset = $("#id_assignment_asset");
        console.log(id_assignment_asset);
    });

    
    
})
