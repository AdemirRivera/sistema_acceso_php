<?php

   $alert = '';

if(!empty($_POST))
{
  if(empty($_POST['nombre']) || empty($_POST['rol']))
  {
    $alert = '<p class="msg_error">Todos los campos son Obligatorios</p>';
  } else{
    include '../php/conexion.php';

    $iduser = $_POST['idusuario'];
    $nombre = $_POST['nombre'];
    $rol = $_POST['rol'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);


    $query= mysqli_query($conection,"SELECT * FROM usuario WHERE (NOMBRE_USUARIO = '$nombre' AND ID_USUARIO = !'$iduser')");
        $result = mysqli_fetch_array($query);


    if($result > 0){
      $alert='<p class="msg_error">El usuario ya existe.</p>';
    }else{

        if(empty($_POST['clave'])){

            $sql_update = mysqli_query($conection, "UPDATE usuario SET NOMBRE_USUARIO = '$nombre', ID_TIPO_USUARIO_USUARIO = '$rol' WHERE ID_USUARIO = '$iduser' ");
        }else{

            $sql_update = mysqli_query($conection, "UPDATE usuario SET NOMBRE_USUARIO = '$nombre', CONTRASENA_USUARIO = '$clave', ID_TIPO_USUARIO_USUARIO = '$rol' WHERE ID_USUARIO = '$iduser' ");

        }

     if($sql_update){

      $alert='<p class="msg_save">Actualizar Usuario creado.</p>';

    }else{
     $alert='<p class="msg_error">Error al Actualizar el usuario.</p>';

   }
 }
    }
}

include '../php/conexion.php';
if(empty($_GET['id'])){
    header('location: ../php/usuarios.php');
}
$iduser = $_GET['id'];

$sql = mysqli_query($conection, "SELECT u.ID_USUARIO, u.NOMBRE_USUARIO, (u.ID_TIPO_USUARIO_USUARIO) as ID_TIPO_USUARIO, (t.TIPO_USUARIO) as TIPO_USUARIO FROM usuario u INNER JOIN tipo_usuario t ON u.ID_TIPO_USUARIO_USUARIO = t.ID_TIPO_USUARIO WHERE ID_USUARIO = $iduser");

$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('location: ../php/usuarios.php');
}  else {
  $option = '';
    while ($data = mysqli_fetch_array($sql)){

        $iduser = $data['ID_USUARIO'];
        $nombre = $data['NOMBRE_USUARIO'];
        $idrol = $data['ID_TIPO_USUARIO'];
        $rol = $data['TIPO_USUARIO'];

        if($idrol == 1){
            $option = '<option value='.$idrol.' selected>'.$rol.'</option>';
        }else if($idrol == 2){
            $option = '<option value='.$idrol.' selected>'.$rol.'</option>';
        }else if($idrol == 3){
            $option = '<option value='.$idrol.' selected>'.$rol.'</option>';
        }else if($idrol == 4){
            $option = '<option value='.$idrol.' selected>'.$rol.'</option>';
        }
    }
}
