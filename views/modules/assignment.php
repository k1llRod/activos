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
      Asignaciones
      <small>Formulario: Buscar asignaciones</small>
    </h1>
  </section>
  <!-- Contenido principal -->
    <section class="content">
        
        <div class="row">

        	<div class="col-lg-12">
					 <div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Buscar</h3>
			            </div>
			            <!-- /.box-header -->
			            <!-- form start -->
			            <form role="form" METHOD="POST" class="form-horizontal">
			              <div class="box-body">
                    <div class="form-group">
					<label for="inputDescripcion" class="col-sm-2 control-label">Funcionario</label>
						<div class="col-sm-10">
							<select class="form-control select2" id="select_employee" name="id_funcionario" data-placeholder="Seleccionar funcionario" style="width: 100%;">
								<?php
									$select_employee = new employeeController();
									$select_employee -> select_employee();
								?>
							</select>
                      	</div>
							
              		</div>
					<div class="form-group">
                      <label for="inputDescripcion" class="col-sm-2 control-label">Ubicación general</label>

                      <div class="col-sm-10">
					 	<select class="form-control" name="location_general" id="location_general">
							
						</select>
                      </div>
                     </div>
					<div class="form-group">
                      <label for="inputSerie" class="col-sm-2 control-label">Ubicación específica</label>

                      <div class="col-sm-10">
						<select class="form-control" name="location_especifica" id="location_especifica">
							
						</select>
                      </div>
                    </div>
					
					 <div class="form-group">
                      <label for="inputObservacion" class="col-sm-2 control-label">Ubicación por área</label>

                      <div class="col-sm-10">
					   	<select class="form-control" name="location_area" id="location_area">
							
						</select>
                      </div>
                     </div>
			              </div>	
			            </form>
			          </div>

					  <div class="box box-info">
						<div class="box-header with-border col-lg-12">
							<h3 class="box-title">Lista de asignaciones</h3>
							<button type="button"  id="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#crear_acta">Crear acta</button>
							</div>
						

						<div class="box-body responsive_tabla" id="chargeAsignaciones">
							
						</div>
						

					</div>    
			         
        	</div>

			<div class="col-lg-12">

				<?php
					include_once 'views/modules/timeline.php';
				?>

			</div>
        	

      	</div>

		  <div class="row">
				
				<!-- Modal -->

				<div class="modal fade" id="crear_acta">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Crear acta</h4>
						</div>
						
						<div class="modal-body" id="modalAsiActivo">
							<form class="form-horizontal" METHOD="POST">
								<input type="hidden" name="funcionario" id="funcionario">
								<input type="hidden" name="user" id="user" value="<?php echo $_SESSION['id'] ?>">
								<div class="box-body">
									<div class="form-group">
										<label for="idAsignarActivo" class="col-sm-2 control-label">IDS</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="idAsignarActivo" name="idAsignarActivo" placeholder="Codigo de asignación" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="codeActa" class="col-sm-2 control-label">Codigo de acta</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="codeActa" name="codeActa" placeholder="Codigo de acta">
										</div>
									</div>
									<div class="form-group">
										<label for="datepicker" class="col-sm-2 control-label">Fecha:</label>
										<div class="input-group date"  class="col-sm-10">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
												<input type="text" class="form-control" id="datepicker" name="datepicker">
										</div>							
									
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<a href="" class="btn btn-app pull-right disabled" id="actaPdf" target="_blank">
												<i class="fa fa-edit"></i> PDF
											</a>
										</div>
									</div>
									
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="cerrarCrearActa" >Cerrar</button>
									<button type="button" class="btn btn-primary" name="guardarActa" id="createActa">Guardar</button>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>


					
			</div>

  </section>
  <!-- Contenido principal -->

  

  
</div>
<!-- Contenido general -->


<?php
include 'views/modules/footer.php'; 
 ?>