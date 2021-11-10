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
      Activos fijos
      <small>Formulario: Nuevo activo</small>
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
			              <h3 class="box-title">Nuevo Activo</h3>
			            </div>
			            <!-- /.box-header -->
			            <!-- form start -->
			            <form role="form" METHOD="POST" class="form-horizontal">
			              <div class="box-body">
                    <div class="form-group">
                      <label for="inputCodigo" class="col-sm-2 control-label">Código</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputCodigo" name="inputCodigo" placeholder="Código del activo">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputDescripcion" name="inputDescripcion" placeholder="Descripcion del activo">
                      </div>
                     </div>
                     <div class="form-group">
                      <label for="inputSerie" class="col-sm-2 control-label">Serie</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSerie" name="inputSerie" placeholder="Serie del activo">
                      </div>
                     </div>
                     <div class="form-group">
                      <label for="inputObservacion" class="col-sm-2 control-label">Observaciones</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputObservacion" name="inputObservacion" placeholder="Observaciones del activo">
                      </div>
                     </div>
                     <div class="form-group">
                      <label for="inputEstado" class="col-sm-2 control-label">Estado</label>

                      <div class="col-sm-10">
                        <select class="form-control" name="inputEstado">
                          <?php
                            $state = new configurationController();
                            $state -> view_state();
                          ?>
                        </select>
                      </div>
                     </div>

                     <div class="form-group">
                      <label for="inputUnidad" class="col-sm-2 control-label">Unidad de medida</label>

                      <div class="col-sm-10">
                      <select class="form-control" name="inputUnidad">
                        <?php
                          $unit = new configurationController();
                          $unit -> view_unit();
                        ?>
                      </select>
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
			                <button type="submit" class="btn btn-primary" name="new_asset">Guardar</button>
			              </div>
                    <?php
                      $new = new accountAssetController();
                      $new-> create_account_asset();
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