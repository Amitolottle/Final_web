<?php session_start(); ?>
   <?php
   $correo =$_POST["correo"];
   $pw =$_POST["pw"];
   $result="";
   include_once("database.php");
   $validar="SELECT usuarios.id AS idUsuario FROM Continuara.usuarios WHERE usuarios.correo='$correo' AND usuarios.contrasena='$pw'";
   $usuarioValido = mysqli_query($con,$validar);

    if(mysqli_num_rows($usuarioValido) < 1)
    {
        $result["error"]="true";
    }

    else{
      while ($row= mysqli_fetch_array($usuarioValido)) {
        $_SESSION["username"] = $row["idUsuario"];
        $result["error"]="false";
      }
    }

  echo  json_encode($result);
    ?>
