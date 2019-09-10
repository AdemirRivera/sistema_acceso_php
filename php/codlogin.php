<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header('location: html/inicio.html');
    exit;
}

require_once 'conectar.php';

$username = $pass = '';

$username_err = $pass_err = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (empty(trim($_POST['username']))){

        $username_err = 'Por favor escribe tu nombre de usuario';
    }else{
        $username = trim($_POST['username']);
    }

    if (empty(trim($_POST['pass']))){

        $pass_err = 'Por favor escribe tu contraseña';
    }else{
        $pass = trim($_POST['pass']);
    }

    //validar credenciales
    if(empty($username_err) && empty($pass_err)){

        $sql = 'SELECT ID_USUARIO, NOMBRE_USUARIO, CONTRASENA_USUARIO FROM usuario WHERE NOMBRE_USUARIO = ?';

        if ($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, 's', $param_username);

            $param_username = $username;

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }

            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_pass);

                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($pass, $hashed_pass)){
                        session_start();

                        //almacenar datos en variables de sesion
                        $_SESSION['loggedin'] = true;
                        $_SESSION['ID_USUARIO'] = $id;
                        $_SESSION['NOMBRE_USUARIO'] = $username;

                        header('location: html/inicio.html');
                }else{
                    $pass_err = 'La contraseña ingresada no es valida';
                }
                }
            } else {
                $username_err = 'No se encontro el usuario';
            }
            }else{
                echo 'UPS!!! algo salio mal, intentalo de nuevo';
        }
    }

   mysqli_close($link);
}
