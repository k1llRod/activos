<?php
session_start();
if (!$_SESSION['validate']) {
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
			Asignaciones de activos fijos
			<small>Funcionarios</small>
		</h1>
	</section>
	<!-- Contenido principal -->
	<section class="content">

		<div class="row">

			<div class="col-lg-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Buscar activos</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" METHOD="POST" class="form-horizontal">
						<div class="box-body">
							<div class="form-group">
								<label for="inputDescripcion" class="col-sm-2 control-label">Ciudad</label>
								<div class="col-sm-10">
									<?php
									$select_location_general = new assignmentController();
									$select_location_general->ciudad();
									?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputDescripcion" class="col-sm-2 control-label">Ubicación general</label>
								<div class="col-sm-10">
									<select class="form-control" name="ubicacion_general" id="ubicacion_general">

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
								<label for="location_areas" class="col-sm-2 control-label">Ubicación por área</label>
								<div class="col-sm-10">
									<select class="form-control" name="location_areas" id="location_areas">

									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputDescripcion" class="col-sm-2 control-label">Funcionario</label>
								<div class="col-sm-10">
									<select class="form-control select2" id="id_employee" name="id_employee" data-placeholder="Seleccionar funcionario" style="width: 100%;">

									</select>
								</div>
							</div>

						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="box box-widget widget-user-2">
					<div id="perfil_usuario">

					</div>
				</div>
			</div>



			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header with-border col-lg-12">
						<h3 class="box-title">Lista de activos fijos</h3>
						<button type="button" id="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#crear_acta_account_asset">Crear acta de asignacion de activo fijo</button>
					</div>
					<table id="tree_activos_fijos" class="table" style="width:100%">
						<thead>
							<tr>
								<th>N</th>
								<th>Código</th>
								<th>Descripción</th>
								<th>Serie</th>
								<th>Observacion</th>
								<th>Estado</th>
								<th>Unidad</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody id="body_table_assignment">

						</tbody>
						<tfoot>
							<tr>

							</tr>
						</tfoot>
					</table>
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

			<div class="modal fade" id="crear_acta_account_asset">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Crear acta de asignacion de activos fijos</h4>
						</div>

						<div class="modal-body" id="modalAsiActivo">
							<form class="form-horizontal" METHOD="POST">
								<input type="hidden" name="id_funcionario" id="id_funcionario">
								<input type="hidden" name="user" id="user" value="<?php echo $_SESSION['id'] ?>">
								<input type="hidden" name="id_asig" id="id_asig">
								<div class="box-body">
									<div class="form-group">
										<label for="idAsignarActivo" class="col-sm-2 control-label">Funcionario</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="funcionario" name="funcionario" placeholder="Funcionario" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="id_assignment_asset" class="col-sm-2 control-label">IDS activos</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="id_assignment_asset" name="id_assignment_asset" placeholder="Codigo de activos asignados" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="codeActa" class="col-sm-2 control-label">Codigo de acta</label>
										<div class="col-sm-10">
											<?php $ver_correlativo = new configurationController;
											$ver_correlativo->view_correlativo(); ?>

										</div>
									</div>
									<div class="form-group">
										<label for="date_assignment_asset" class="col-sm-2 control-label">Fecha:</label>
										<div class="input-group date" class="col-sm-10">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control date_assignment_asset" data-date-format="dd/mm/yyyy" name="date_assignment_asset" id="date_assignment_asset">
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
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="cerrarCrearActa">Cerrar</button>
									<button type="button" class="btn btn-primary" name="create_account_assignment" id="create_account_assignment">Guardar</button>
								</div>
								<?php

								if (isset($_POST['create_account_assignment'])) {
									echo "FUNCIONA*///////////////////////////";
									$create_asignment_account = new accountAsignmentController();
									$create_asignment_account->crear_acta_asignacion_activos();
								}
								?>
							</form>
						</div>

						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
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