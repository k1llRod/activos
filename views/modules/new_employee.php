<?php
session_start();
if(!$_SESSION['validate']){
  header("location:index.php?action=login");
  exit();
}

  include 'views/modules/header.php';
  include 'views/modules/left_menu.php';
 ?>


 <div class="content-wrapper">
  <!-- Cabecera pagina -->
  <section class="content-header">
    <h1>
      Funcionarios
      <small>Formulario: Nuevo funcionario</small>
    </h1>
  </section>
  <!-- Contenido principal -->
    <section class="content">
       
        <div class="row">

        	<div class="col-lg-8">
					 <div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Nuevo funcionario</h3>
			            </div>
			            <!-- /.box-header -->
			            <!-- form start -->
			            <form role="form" METHOD="POST" class="form-horizontal">
			              <div class="box-body">
                    <div class="form-group">
                      <label for="inputCI" class="col-sm-2 control-label">C.I.</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputCI" name="inputCI" placeholder="Carnet  de identidad">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputNombres" class="col-sm-2 control-label">Nombres</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNombres" name="inputNombres" placeholder="Nombre completo">
                      </div>
                     </div>
                     <div class="form-group">
                      <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputApellidos" name="inputApellidos" placeholder="Apellidos paterno y materno">
                      </div>
                     </div>
                     <div class="form-group">
                      <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputCargo" name="inputCargo" placeholder="Cargo del funcionario">
                      </div>
                     </div>
					 <div class="form-group">
                      <label for="inputEstado" class="col-sm-2 control-label">Estado</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEstado" name="inputEstado" placeholder="Estado del funcionario">
                      </div>
                     </div>
                    
			                <!-- Date 
					              <div class="form-group">
					                <label for="fecha_nacimiento">Fecha de nacimiento:</label>

					                <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text" class="form-control pull-right" id="fecha_datepicker" name="fecha_nacimiento">
					                </div>
					                 /.input group 
					              </div>-->

			                 <!-- select -->
			               
			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" class="btn btn-primary" name="new_employee">Guardar</button>
			              </div>
                    <?php
                      $new = new employeeController();
                      $new-> create_employee();
                    ?>
							
			            </form>
			          </div>
			          <!-- /.box -->

			         
        	</div>
        	<div class="col-lg-4">
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


<?php
include 'views/modules/footer.php'; 
 ?>