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
		  <div class="modal fade" id="edit_account_asset">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Editar activo fijo</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="formEditAccountAsset" METHOD="post">
						<div class="box-body" id="modalEditAccountAsset">
							
							
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<a href="#"class="btn btn-info" id="ver_historial">Ver historial</a>
					<button type="submit" class="btn btn-primary">Guardar cambios</button>
					</form>
				</div>
				</div>
				<!-- /.modal-content -->
			</div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
         

  </section>
  <!-- Contenido principal -->
  
</div>
<!-- Contenido general -->


<?php
include 'views/modules/footer.php'; 
 ?>