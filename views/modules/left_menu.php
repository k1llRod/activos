
  <!-- MENU IZQUIERDO -->

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="vista/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" id="id_usuario">
          <p class="<?php echo $_SESSION['id']; ?>" id="<?php echo $_SESSION['id'] ?>"><?php echo $_SESSION['name'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu principal</li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Activos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="new_account_asset"><i class="fa fa-circle-o"></i> Crear activo</a></li>
            <li><a href="account_asset"><i class="fa fa-circle-o"></i> Ver activos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Funcionarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="new_employee"><i class="fa fa-circle-o"></i> Crear funcionario</a></li>
            <li><a href="employee"><i class="fa fa-circle-o"></i> Ver funcionarios</a></li>
          </ul>
        </li>

        <li><a href="assignment"><i class="fa fa-tachometer fa-fw"></i> <span>Asignaciones</span></a></li>
    
        <li><a href="configuracion"><i class="fa fa-tachometer fa-fw"></i> <span>Configuracion</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>







  
