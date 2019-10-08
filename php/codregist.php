<?php
   $alert = '';

if(!empty($_POST))
{
  if(empty($_POST['nombre']) || empty($_POST['clave']) || empty($_POST['rol']))
  {
    $alert = '<p class="msg_error">Todos los campos son Obligatorios</p>';
  } else{
    include '../php/conexion.php';

    $nombre = $_POST['nombre'];
    $rol = $_POST['rol'];

    if(strlen(trim($_POST['clave'])) < 4){
        $alert ='<p class="msg_error">La contraseña debe tener mas de 4 caracteres</p>' ;
    }else{
         $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    $query= mysqli_query($conection,"SELECT * FROM usuario WHERE NOMBRE_USUARIO = '$nombre'");
        $result = mysqli_fetch_array($query);


    if($result > 0){
      $alert='<p class="msg_error">El usuario ya existe.</p>';
    }else{

     $query_insert = mysqli_query($conection,"INSERT INTO usuario(NOMBRE_USUARIO, CONTRASENA_USUARIO, ID_TIPO_USUARIO_USUARIO, estatus)
                                                VALUES('$nombre','$clave','$rol', 1)");

     if($query_insert ){

      $alert='<p class="msg_save">Nuevo Usuario creado.</p>';

    }else{
     $alert='<p class="msg_error">Error al Crear el usuario.</p>';

   }
 }
    }
}
}
