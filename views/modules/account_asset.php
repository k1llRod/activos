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
      <small>Lista: Ver activos fijos</small>
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

        	<div class="col-lg-12">
					 <div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Lista</h3>
			            </div>
						<table id="ver_account_asset" class="row-border hover" style="width:100%">
							<thead>
								<tr>
									<th>N</th>
									<th>Código</th>
									<th>Descripción</th>
									<th>Serie</th>
									<th>Estado</th>
									<th>U.M</th>
									<th>Fecha registro</th>
									<th>Código registro</th>
									<th></th>    
								</tr>
							</thead>
							<tbody id="body_table">
							
							</tbody>
							<tfoot>
                                <tr>

                                </tr>
                            </tfoot>
					</table>
			           
			           
                   
							
			            
			          </div>
			          <!-- /.box -->

			         
        	</div>
        
      	</div>
			<!-- Modal -->
			<div class="modal fade" id="edit_account_asset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Editar activo fijo</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<!-- Horizontal Form -->
								<!-- form start -->
								<form class="form-horizontal" id="formEditAccountAsset">
								<div class="box-body">
									<input type="hidden" name="id_activo" id="id_activo">
									<div class="form-group">
									<label for="codigo" class="col-sm-2 control-label">Código</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código">
										</div>
									</div>
									<div class="form-group">
									<label for="descripcion" class="col-sm-2 control-label">Descripción</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
										</div>
									</div>
									<div class="form-group">
									<label for="serie" class="col-sm-2 control-label">Serie</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="serie" name="serie" placeholder="Serie">
										</div>
									</div>
									<div class="form-group">
									<label for="estado" class="col-sm-2 control-label">Estado</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="estado" name="estado" placeholder="Descripción">
										</div>
									</div>
									<div class="form-group">
									<label for="unidad_medida" class="col-sm-2 control-label">Unidad de medida</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="unidad_medida" name="unidad_medida" placeholder="Descripción">
										</div>
									</div>
									<div class="form-group">
									<label for="fecha_registro" class="col-sm-2 control-label">Fecha de registro</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="Descripción">
										</div>
									</div>
									<div class="form-group">
									<label for="codigo_registro" class="col-sm-2 control-label">Código de registro</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="codigo_registro" name="codigo_registro" placeholder="Descripción">
										</div>
									</div>
									
								</div>
							<!-- /.box -->
						</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar cambios</button>
							</div>
						
						</form>
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