<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestión de activos fijos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="views/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="views/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="views/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-daterangepicker/daterangepicker.css">
 

  <link rel="stylesheet" href="views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="views/css/styles.css">

  <link rel="stylesheet" media="only screen and (max-width:768px)" href="views/css/arregloResponsive.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="views/dist/css/sweetalert.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
 


  <script src="views/dist/js/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script> 
  <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <style>
    .swal2-popup {
      font-size: 2rem !important;
    }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini fixed" style="height: 100%;">
<div class="wrapper">
    <?php 
      $template = new linksControllers();
      $template->linkController();
     ?>
</div>
<!-- jQuery 3 -->
<script src="views/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="views/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="views//bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Morris.js charts -->
<script src="views/bower_components/raphael/raphael.min.js"></script>
<script src="views/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="views/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="views/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="views/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="views/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="views/bower_components/moment/min/moment.min.js"></script>
<script src="views/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="views/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="views/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/dist/js/demo.js"></script>

<script src="views/dist/js/jquery.dataTables.min.js"></script>

<script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="views/js/validacionUsuario.js"></script>
<script src="views/js/botonArchivo.js"></script>
<script src="views/js/validarFormularios.js"></script>
<script src="views/js/maximizar.js"></script>
<script src="views/js/account_asset.js"></script>


<script>
  $('.select2').select2();

  $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd'}).datepicker('setDate', 'today');
  //$("#date_assignment_asset").datepicker('setDate', 'today');
  $(".date_assignment_asset").datepicker({
      dateFormat: 'dd-mm-yy',//check change
      changeMonth: true,
      changeYear: true
    }).datepicker('setDate', 'today');
  table_account_asset = $("#ver_account_asset").DataTable({
    responsive: true,
    select:{
      style: 'single'
    },
    'ajax':{
    'url': 'views/ajax/account_asset.php',
    'method': 'POST',
    'data':{option:'option'},
    'dataSrc':''
    },
    'columns':[
      {'data':'id_activo',
        'className':'id'      
      },
      {'data':'codigo'},
      {'data':'descripcion'},
      {'data':'serie'},
      {'data':'estado'},
      {'data':'nombre'},
      {'data':'fecha_registro'},
      {'data':'codigo_registro'},
      {'defaultContent':'<button type="button" class="btn btn-primary btnEditAccountAsset" data-toggle="modal" data-target="#edit_account_asset"><i class="fa fa-pencil"></i></button>'}
    ],
  }); 
  var tree_account_asset_assignment = $("#tree_activos_fijos").DataTable({
      dom: 'Bfrtip',
      buttons: [
          'selectAll',
          'selectNone'
      ],
      
      select: {
          style: 'multi'
      },
      'ajax':{
      'url': 'views/ajax/account_asset.php',
      'method': 'POST',
      'data':{charge:'all'},
      'dataSrc':''
      },
      rowId: 'id_activo',
      'columns':[
        {'data':'id_activo',
          'className':'id_activo'      
        },
        {'data':'codigo'},
        {'data':'descripcion'},
        {'data':'serie'},
        {'data':'observaciones'},
        {'data':'id_estado'},
        {'data':'id_unidad'},
        {'data':'estado_asignacion_activo'}
      ],
      
  });
  $('#tree_activos_fijos tbody').on( 'click', 'tr', function () {
    $(this).toggleClass('selected');
    var a = tree_account_asset_assignment.row(this).data();

    //console.log("A" + a[class]);
  });

  $('#button').click(function(){
      var n = tree_account_asset_assignment.rows('.selected').ids().length;
      var ids = tree_account_asset_assignment.rows('.selected').ids();
      var id_funcionario = $('#id_employee').val();
      var funcionario = $('#id_employee option:selected').text();
      var valor='';
      valor = ids[0];
      for(i=1; i<n; i++) {
          valor = valor+ ',' + ids[i];
      }
      console.log('VALOR' + valor);
      $('#id_assignment_asset').val(valor);
      console.log('ID FUNCIONARUIO' + id_funcionario);
      $('#funcionario').val(funcionario);
      $('#id_funcionario').val(id_funcionario); 
    });
  //$("#ver_account_asset tbody").on('click', 'tr', function () {
    //  var data = table_account_asset.row(this).data();
      //console.log(data['id_activo']);
      //alert('Click en el activo '+data['id_activo']+'\'s row');
  //});
</script>
<script>
     $('#reservation').daterangepicker({
        "locale": {
            "format": "DD-MM-YYYY",
            "separator": " / ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizar",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        "opens": "center"
     })
</script>
</body>
</html>