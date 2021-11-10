<?php 

 session_start();
  if(!$_SESSION['validar']){
    header('location:ingreso');
    exit();
  }

 ?>

<?php 
  include 'vista/modulos/header.php';
  include 'vista/modulos/menu_izquierdo.php';
 ?>

<?php 
  if($_SESSION['cargo'] == 'administrador'){
    ?>

 <div class="content-wrapper">
  <!-- Cabecera pagina -->
  <section class="content-header">
    <h1>
      Usuarios
      <small>Panel de control</small>
    </h1>
  </section>


    <section class="content">
        <div class="row">

          <?php require_once 'panel_global.php'; ?>
          
        </div>
        

        

        <div class="row">

          <div class="col-lg-7">
              
                <!-- About Me Box -->
              <div class="box box-primary">


            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="vista/dist/img/images.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION['cargo'].' - '.$_SESSION['id']; ?></p>

                        <!-- /.box-body -->
          </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Sobre mi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i> Educacion</strong>

                  <p class="text-muted">
                    Academia de policias
                    B.S. Ciencias de la computacion Academia de policias
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Lugar</strong>

                  <p class="text-muted">La Paz, Bolivia</p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong>

                  <p>Tecnologias de la informacion y la comunicacion</p>
                </div>
                <!-- /.box-body -->
              </div>
          <!-- /.box -->
          

            
          </div>
          <div class="col-lg-5">
             <!-- Calendar -->
              <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>

                  <h3 class="box-title">Calendar</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bars"></i></button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                      </ul>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-black">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Progress bars -->
                      <div class="clearfix">
                        <span class="pull-left">Task #1</span>
                        <small class="pull-right">90%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                      </div>

                      <div class="clearfix">
                        <span class="pull-left">Task #2</span>
                        <small class="pull-right">70%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="clearfix">
                        <span class="pull-left">Task #3</span>
                        <small class="pull-right">60%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                      </div>

                      <div class="clearfix">
                        <span class="pull-left">Task #4</span>
                        <small class="pull-right">40%</small>
                      </div>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>
          </div>
              
          
        
        </div>

         

  </section>
  <!-- Contenido principal -->
  
</div>
<!-- Contenido general -->

<?php }else{ ?>

<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Profile
        <small>Estudiante</small>
      </h1>
  </section>
  <section class="content">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="vista/dist/img/images.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION['cargo']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Codigo de estudiante : </b> <a class="pull-right"><?php echo $_SESSION['id']; ?></a>
                </li>

                <li class="list-group-item">
                  <b>Curso : </b> <a class="pull-right"><?php echo $_SESSION['anio_curso']; ?></a>
                </li>

                <li class="list-group-item">
                  <b>Paralelo : </b> <a class="pull-right"><?php echo $_SESSION['paralelo']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Fecha de nacimiento : </b> <a class="pull-right"><?php echo $_SESSION['fecha_nacimiento']; ?></a>
                </li>
              </ul>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
            
          <!-- /.box -->
        </div>

        <div class="col-md-8">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registro de las sanciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php

              $registro_sancion = new cadetesControlador();
              $registro_sancion -> cantidad_sanciones();
          

               ?>
            </div>
            <!-- /.box-body -->
          </div>

             <div class="box">
              <div class="box-header">
                <h3 class="box-title">Registro de documentos enlazados</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="ver_archivos" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                       <th>N</th>
                          <th>Titulo</th>
                          <th>Fecha registro</th>
                          <th>Archivo</th>
                          <th>Usuario</th>
                          <th></th>
                    </tr>
                    </thead>
                    <tbody id="llenar_archivos">
                      <?php
                      if(isset($_GET['id_sancion'])){
                          $registro_sancion -> ver_archivos_sancion();
                      }
                        
                        

                       ?>
                     </tbody>
                   
                </table>  
              </div>
              <!-- /.box-body -->
            </div>

             
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        
      </div>

  </section>

</div>



<?php } ?>



<?php
include 'vista/modulos/pie.php'; 
 ?>