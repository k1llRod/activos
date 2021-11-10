<div class="ingreso" style="background-color: #f5f5f5;"> 
  <form class="form-signin" METHOD="POST" onsubmit="return validarIngreso()">
      <img class="mb-6" src="views/images/logo.png" alt="" width="180" height="72">
      <label for="inputText" class="sr-only">Usuario</label>
      <input type="text" id="inputText" class="form-control" placeholder="Cuenta de usuario" name="inputText" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword"required>
      <?php
        $login= new loginControllers();
        $login->loginController();
      ?>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordar cuenta
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">k1llRod &copy; 2021</p>
    </form>
</div>    


