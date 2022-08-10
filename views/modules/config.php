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
      Asignaciones de activos fijos
      <small>Funcionarios</small>
    </h1>
  </section>
  <!-- Contenido principal -->
    <section class="content">
        <!--<div class="row">
        	<div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Buscar activos</h3>
                    </div>
                    
                    <form role="form" METHOD="POST" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Correlativo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Prefijo - correlativo">
                                    </div> 
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="save_prefijo">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>    
      	</div>-->
        <div class="row">
        	<div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Correlativo</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-header">
                          <h3 class="box-title">Lista de correlativos</h3>
                        </div>
                      <!-- /.box-header -->
                        <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <th>N</th>
                              <th>Correlativo</th>
                            </thead>
                            <tbody>
                              <?php  
                                $tree_correlativo = new configurationController();
                                $tree_correlativo -> tree_view_correlativo();
                              ?>
                            </tbody>
                          </table>
                          <tfoot>
                            <tr>
                              <th>
                                <div class="box-footer">
                                  <button type="button" class="btn btn-primary" name="form_correlativo" data-toggle="modal" data-target="#form_correlativo">Crear</button>
                              </div>
                              </th>
                            </tr>
                          </tfoot>
                    </div>
                </div>
            </div>    
      	</div>
        <div class="modal fade" id="form_correlativo">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Crear nuevo correlativo</h4>
						</div>
						
						<div class="modal-body" id="modalAsiActivo">
              <form role="form" METHOD="POST" class="form-horizontal">
                  <div class="box-body">
                      <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Correlativo</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Prefijo - correlativo">
                              </div> 
                      </div>
                  </div>
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary" name="save_prefijo">Guardar</button>
                  </div>
                </form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
          <?php
            if(isset($_POST['save_prefijo'])){
                $guardar_correlativo = new configurationController;
                $guardar_correlativo -> crear_correlativo();
            }
          ?>
  </section>
  <!-- Contenido principal -->

  

  
</div>
<!-- Contenido general -->


<?php
include 'views/modules/footer.php'; 
 ?>