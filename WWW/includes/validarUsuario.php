
<!-- Se crea la sesión mediante este metodo. Con ella espero
poder acceder al id del usuario con el correo que se le pasó desde login en las 
paginas que sea necesario. -->
<?php session_start(); ?>

<html>
<head>
    <title>Validando usuario...</title>
    <meta charset="UTF-8">
</head>


<body>

<!--  Se pasa el correo y contraseña que llegó desde login para validar si este usuario existe
   en la base de datos -->
   <?php
   $correo =$_POST["correo"];
   $pw =$_POST["pw"];
   include_once("database.php");
   $validar="SELECT usuarios.id AS idUsuario FROM Continuara.usuarios WHERE usuarios.correo='$correo' AND usuarios.contrasena='$pw'";
   $usuarioValido = mysqli_query($con,$validar);


    /*Si no encontró ningún usuario arroja un mensaje de error y
    redirecciona al usuario a la pagina de login. Sí encuentra al usuario
    pasa a darle el id de este usuario al objeto de sesión y lo redirige
    al index */
    if(mysqli_num_rows($usuarioValido) < 1)
    {
        echo "<h1>¡Sus datos no coinciden con algún usuario registrado!</h1>";
        echo "<h2>Asegurese de haber digitado bien sus datos</h2>";
        echo "<h2>Si no tiene una cuenta debe crear una</h2>";
        echo "<h3>En un momento será redireccionado</h3>";
        echo"<meta http-equiv='refresh' content='6;url=/Final/index.php'>";
    }

    else{
      while ($row= mysqli_fetch_array($usuarioValido)) {
        $_SESSION["username"] = $row["idUsuario"];
        echo"<meta http-equiv='refresh' content='0.5;url=/Final/home.php'>";
      }
    }
    ?>
</body></html>