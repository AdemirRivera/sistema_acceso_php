<?php
//Inclusion de codigo
include 'php/codlogin.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/estil.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale, maximum-scale=1.0, minimum-scale=1.0">
    </head>

    <body>
      <!-- CONTENEDOR TOTAL -->
      <div class="container-all">
      <!-- CONTENEDOR PRINCIPAL -->
          <div class="ctn-form">
              <img src="resources/icons/user.png" alt="" class="logo">
            <h1 class="title">Iniciar Sesion</h1>
      <!-- FORMULARIO -->
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label for="">Usuario</label>
                <input type="text" name="username">
                <span class="msg-error"><?php echo $username_err; ?></span>
                <label for="">Contraseña</label>
                <input type="password" name="pass">
                <span class="msg-error"><?php echo $pass_err; ?></span>
                <input type="submit" value="Iniciar">
            </form>

          </div>
      <!-- CONTENEDOR BLUR -->
        <div class="ctn-text">
            <div class="capa"></div>
        </div>
      </div>
    </body>
</html>
