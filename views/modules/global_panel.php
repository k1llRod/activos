<div class="col-lg-3 col-xs-6">
            <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">

        <?php $cantidadTotal =  new panelControlador();
              $cantidadTotal -> cantidad_total_cadetes();
         ?>

        <p>Cantidad Total de estudiantes</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="index.php?action=castigos&ver=total" class="small-box-footer">Ver Informacion <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>


  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">

        <?php
              $cantidadSinSancion = new panelControlador();
              $cantidadSinSancion -> cantidad_cadetes_sin_falta();
         ?>

        <p>Estudiantes sin sanciones activas</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="index.php?action=castigos&ver=no_activas" class="small-box-footer">Ver informacion <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>


   <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <?php
              $cantidadSancionActivas = new panelControlador();
              $cantidadSancionActivas -> cantidad_sancion_activas();
         ?>

        <p>Estudiantes con sanciones en proceso</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="index.php?action=castigos&ver=activas" class="small-box-footer">Ver informacion <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>


  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <?php
          $cantidadSancionActivas->cantidad_usuarios_resolutivo();
         ?>

        <p>Estudiantes con procesos resolutivos</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="index.php?action=castigos&ver=resolutivo" class="small-box-footer">Ver informacion <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div> 