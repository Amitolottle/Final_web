<?php session_start(); ?>
<html>
<head>
    <title>Registrando usuario</title>
    <meta charset="UTF-8">
</head>


<body>
    <?php
    $nombres =$_POST["nombres"];
    $correo =$_POST["correo"];
    $pw =$_POST["pw"];
    $confirmacion=$_POST["confirmarPw"];
    $fecha=$_POST["fecha"];
    $genero=$_POST["genero"];
    include_once("database.php");

    /* Si el campo de contraseña coincide con el de confirmar contraseña, añade un usuario nuevo a la tabla usuarios.
    Si estos no coinciden muestra un mensaje de error y lo redirige a la pagina de login*/
    if($pw==$confirmacion){
        $registrar="INSERT INTO Continuara.usuarios
        (`correo`, `nombre`, `contrasena`, `nacimiento`, `genero`, `rutaImg`) VALUES ('$correo','$nombres','$pw','$fecha','$genero', 'images/default.png')";
        $comunicacion= mysqli_query($con,$registrar);

        //Luego selecciona el último usuario que se acabó de añadir
        $ultimoUsuario="SELECT usuarios.id AS idUsuario From COntinuara.usuarios ORDER BY usuarios.id DESC LIMIT 1";
        $ultimo= mysqli_query($con,$ultimoUsuario);
        while($row=mysqli_fetch_array($ultimo)){
           $_SESSION["username"] = $row["idUsuario"];
       }
       echo"<meta http-equiv='refresh' content='0.5;url=/Final/home.php'>";
   }else{
    echo"<h2>Las contraseñas no son iguales, por favor vuelva a intentarlo</h2>";
    echo"<meta http-equiv='refresh' content='6;url=/Final/index.php'>";
}
if($comunicacion == false)
{
  echo "<h4>Error: ".mysqli_error($con)."</h4>";
} 
?>
</body></html>