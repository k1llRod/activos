$(document).ready(function() {

    var table = $('#ver_asignaciones').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'selectAll',
            'selectNone'
        ],
        
        select: {
            style: 'multi'
        },
        responsive: {
            breakpoints: [
              {name: 'bigdesktop', width: Infinity},
              {name: 'meddesktop', width: 1480},
              {name: 'smalldesktop', width: 1280},
              {name: 'medium', width: 1188},
              {name: 'tabletl', width: 1024},
              {name: 'btwtabllandp', width: 848},
              {name: 'tabletp', width: 768},
              {name: 'mobilel', width: 480},
              {name: 'mobilep', width: 320}
            ]
          }
    });
    $('#ver_asignaciones tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
    
    $('#button').click(function(){
        var n = table.rows('.selected').ids().length;
        var ids = table.rows('.selected').ids();
        var valor='';
        valor = ids[0];
        for(i=1; i<n; i++) {
            valor = valor+ ',' + ids[i];
        }
        console.log(valor);
        $('#idAsignarActivo').val(valor);
    });
})
