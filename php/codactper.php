<?php

   $alert = '';

if(!empty($_POST))
{
  if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['tel']))
  {
    $alert = '<p class="msg_error">Todos los campos son Obligatorios</p>';
  } else{
    include '../php/conexion.php';

    $iduser = $_POST['idusuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tel = $_POST['tel'];
    $ident = $_POST['ident'];

    $query= mysqli_query($conection,"SELECT * FROM personal WHERE (NUMERO_IDENTIDAD_PERSONAL = '$ident' AND ID_PERSONAL = !'$iduser')");
        $result = mysqli_fetch_array($query);

    if($result > 0){
      $alert='<p class="msg_error">El Personal ya existe.</p>';
    }else{

      if(empty($_POST['rol'])){

        $sql = mysqli_query($conection, "SELECT ID_USUARIO_PERSONAL FROM personal");
            $data = mysqli_fetch_array($sql);

              $mets = $data['ID_USUARIO_PERSONAL'];
              $rol = $mets;

      }else {

        $rol = $_POST['rol'];

       }

      if(empty($_POST['ident'])){

          $sql_update = mysqli_query($conection, "UPDATE personal SET NOMBRE_PERSONAL = '$nombre', APELLIDOS_PERSONAL = '$apellido', TELEFONO_PERSONAL = '$tel', ID_USUARIO_PERSONAL = '$rol' WHERE ID_PERSONAL = '$iduser'");

      }else{

          $sql_update = mysqli_query($conection, "UPDATE personal SET NOMBRE_PERSONAL = '$nombre', APELLIDOS_PERSONAL = '$apellido', NUMERO_IDENTIDAD_PERSONAL = '$ident', TELEFONO_PERSONAL = '$tel', ID_USUARIO_PERSONAL = '$rol' WHERE ID_PERSONAL = '$iduser'");

      }


     if($sql_update){
      mysqli_query($conection, "UPDATE usuario SET vacante = 1 WHERE ID_USUARIO = '$iduser' ");
      $alert='<p class="msg_save">Actualizar Personal creado.</p>';

    }else{
     $alert='<p class="msg_error">Error al Actualizar el Personal.</p>';

   }
 }
    }
}

include '../php/conexion.php';
if(empty($_GET['id'])){
    header('location: ../php/personal.php');
}
$iduser = $_GET['id'];

$sql = mysqli_query($conection, "SELECT p.ID_PERSONAL, p.NOMBRE_PERSONAL, p.APELLIDOS_PERSONAL, p.NUMERO_IDENTIDAD_PERSONAL, p.TELEFONO_PERSONAL, (p.ID_USUARIO_PERSONAL) as ID_USUARIO, (u.NOMBRE_USUARIO) as NOMBRE_USUARIO FROM personal p INNER JOIN usuario u ON p.ID_USUARIO_PERSONAL = u.ID_USUARIO WHERE ID_PERSONAL = '$iduser'");

$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('location: ../principal/personal.php');
}  else {
  $option = '';
    while ($data = mysqli_fetch_array($sql)){

      $nombre = $data['NOMBRE_PERSONAL'];
      $apellido = $data['APELLIDOS_PERSONAL'];
      $tel = $data['TELEFONO_PERSONAL'];
      $ident = $data['NUMERO_IDENTIDAD_PERSONAL'];


      $query = mysqli_query($conection, 'SELECT p.ID_PERSONAL, p.NOMBRE_PERSONAL, u.NOMBRE_USUARIO FROM personal p INNER JOIN usuario u ON p.ID_USUARIO_PERSONAL = u.ID_USUARIO');

      $idopt = $data['ID_PERSONAL'];
      $idoptuser = $data['ID_USUARIO'];
      $mess = $data['NOMBRE_USUARIO'];
     $option = '<option value='.$idoptuser.' selected>'.$mess.'</option>';

        // else if($idrol == 2){
        //     $option = '<option value='.$idrol.' selected>'.$rol.'</option>';
        // }else if($idrol == 3){
        //     $option = '<option value='.$idrol.' selected>'.$rol.'</option>';
        // }else if($idrol == 4){
        //     $option = '<option value='.$idrol.' selected>'.$rol.'</option>';
        // }

    }
}
