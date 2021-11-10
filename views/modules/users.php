<?php 
  include 'vista/modulos/header.php';
  include 'vista/modulos/menu_izquierdo.php';
 ?>


 <div class="content-wrapper">
  <!-- Cabecera pagina -->
  <section class="content-header">
    <h1>
      Usuarios
      <small>Panel de control</small>
    </h1>
  </section>
  <!-- Contenido principal -->
    <section class="content">
        <div class="row">
        	<div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3>150</h3>

	              <p>New Orders</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-bag"></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>


	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-green">
	            <div class="inner">
	              <h3>53<sup style="font-size: 20px">%</sup></h3>

	              <p>Bounce Rate</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-stats-bars"></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>


	         <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3>44</h3>

	              <p>User Registrations</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-person-add"></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>

			
			 <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-red">
	            <div class="inner">
	              <h3>65</h3>

	              <p>Unique Visitors</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-pie-graph"></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>

        
          
        </div>
        

        

        <div class="row">

        	<div class="col-lg-8">
					 <div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Nuevo Usuario</h3>
			            </div>
			            <!-- /.box-header -->
			            <!-- form start -->
			            <form role="form" METHOD="POST">
			              <div class="box-body">
							
							<div class="form-group">
			                  <label for="ci">CI</label>
			                  <input type="text" class="form-control" id="nombres" name="ci" placeholder="Ingrese su carnet de identidad">
			                </div>

			              	<div class="form-group">
			                  <label for="nombres">Nombres</label>
			                  <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese su nombre">
			                </div>
			                <div class="form-group">
			                  <label for="apellidos">Apellido</label>
			                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese su apellido">
			                </div>

			                <!-- Date -->
					              <div class="form-group">
					                <label for="fecha_nacimiento">Fecha de nacimiento:</label>

					                <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text" class="form-control pull-right" id="fecha_datepicker" name="fecha_nacimiento">
					                </div>
					                <!-- /.input group -->
					              </div>

					            

			               
			                <div class="form-group">
			                  <label for="cuenta">Cuenta</label>
			                  <input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="Ingrese su cuenta">
			                </div>
			                <div class="form-group">
			                  <label for="pass">Password</label>
			                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
			                </div>
			                <div class="form-group">
			                  <label for="exampleInputFile">Fotografia</label>
			                  <input type="file" id="fotografia" name="fotografia">

			                  <p class="help-block">Ingrese su fotografia 20x20 cm</p>
			                </div>

			                 <!-- select -->
			                <div class="form-group">
			                  <label>Lugar de nacimiento</label>
			                  <select class="form-control" name="lugar_nacimiento">
			                    <option value="LP">option 1</option>
			                    <option value="LP">option 2</option>
			                    <option value="LP">option 3</option>
			                    <option value="LP">option 4</option>
			                    <option value="LP">option 5</option>
			                  </select>
			                </div>
			                
			              </div>

			              <div class="form-group">
			                  <label>Tipo de usuario</label>
			                  <select class="form-control" name="tipo" id="tipo">
			                    <option value="1">Cadete</option>
			                    <option value="2">Instructor </option>
			                    
			                    
			                  </select>
			                </div>
			               <div class="form-group">
			                  <label>Cargo</label>
			                  <select class="form-control" name="cargo" id="cargo" disabled>
			                  	<option value="">Selecciona un cargo</option>
			                    <option value="1">prueba</option>
			                    <option value="2">Prueba 2</option>
			                    
			                    
			                  </select>
			                </div> 

			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" class="btn btn-primary">Aceptar</button>
			              </div>
							

			            </form>
			          </div>
			          <!-- /.box -->

			          <?php
			          $nuevo = new usuariosControlador();
			          $nuevo-> nuevoUsuario();
			           ?>


        		
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
include 'vista/modulos/pie.php'; 
 ?>