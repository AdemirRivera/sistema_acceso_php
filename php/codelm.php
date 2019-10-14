<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';

if(!empty($_POST)){

    $iduser = $_POST['idusuario'];

    $query_delete = mysqli_query($conection, "UPDATE usuario SET estatus = 0 WHERE ID_USUARIO = $iduser");

    if($query_delete){
    header('location: usuarios.php');
    }else{
        echo 'Error al eliminar';
    }
}

if(empty($_REQUEST['id'])){
    header('location: usuarios.php');
}else{

    include 'conexion.php';

    $iduser = $_REQUEST['id'];

    $query = mysqli_query($conection, "SELECT u.NOMBRE_USUARIO, t.TIPO_USUARIO FROM usuario u INNER JOIN tipo_usuario t ON u.ID_TIPO_USUARIO_USUARIO = t.ID_TIPO_USUARIO WHERE ID_USUARIO ='$iduser' ");

    $result = mysqli_num_rows($query);

    if($result > 0){

        while ($data = mysqli_fetch_array($query)){

            $nombre = $data['NOMBRE_USUARIO'];
            $rol = $data['TIPO_USUARIO'];
        }
    }  else {
            header('location: usuarios.php');

    }
}
