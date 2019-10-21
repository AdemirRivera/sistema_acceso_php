<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estil4.css">
    <link rel="stylesheet" href="../css/style4.css">
    <link rel="stylesheet" href="../css/style5.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <?php
    include '../includes/header.php';
    include '../includes/sidebar.php';
     ?>
    <?php
         include '../php/codregper.php';
         include '../php/conexion.php';
          ?>

    <section id="container">
      <center>
              <div class="form_register">
  		<h1>Registro de Personal</h1>
                  <hr>
                  <div class="alert"><?php echo isset($alert) ? $alert: ''; ?></div>
                  <form action="" method="post">
                          <img src="../resources/icons/users.png" alt="" class="logoy">
                          <label for="nombre">Nombre</label>
                          <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">
                          <label for="apellido">Apellido</label>
                          <input type="text" name="apellido" id="apellido" placeholder="Apellido Completo">
                          <label for="ident">Numero de identidad</label>
                          <input type="text" name="ident" id="ident" placeholder="DUI, NIT, etc">
                          <label for="tel">Telefono</label>
                          <input type="number" name="tel" id="tel" placeholder="Telefono">
                          <label for="rol">Usuario</label>

                          <?php

                          $query_user = mysqli_query($conection, 'SELECT * FROM usuario WHERE vacante = 0');
                          $test = mysqli_fetch_array($query_user);

                          if(empty ($test)){
                            $memo ='<p class="msg_error">No existen Usuarios Vacantes.</p><br><p class="msg_error">Para poder Registrar un Nuevo Empleado Registre un nuevo Usuario.</p>';
                         ?>

                         <div class="alert"><?php echo $memo ?></div>

                          <?php
                          }else{
                          ?>
                          <select name="rol" id="rol">
                              <option selected disabled>Seleccionar Usuario</option>
                              <?php
                              $query_user = mysqli_query($conection, 'SELECT * FROM usuario WHERE vacante = 0');
                              $result_user = mysqli_num_rows($query_user);

                              if($result_user > 0){
                                  while ($user = mysqli_fetch_array($query_user)){

                              ?>
                              <option value="<?php echo $user['ID_USUARIO'] ?>"><?php echo $user['NOMBRE_USUARIO'] ?></option>
                            <?php
                                  }
                              }
                            }

                              ?>

                          </select>
                          <input type="submit" value="Registrar" class="btn_save">
                      </form>
                  </div>
                </center>
  	</section>
    <script type="text/javascript" src="../js/trast.js"></script>

  </body>
</html>
