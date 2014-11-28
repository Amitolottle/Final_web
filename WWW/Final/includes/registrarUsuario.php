<?php session_start(); ?>
    <?php
    $nombres =$_POST["nombres"];
    $correo =$_POST["correo"];
    $pw =$_POST["pw"];
    $confirmacion=$_POST["confirmarPw"];
    $fecha=$_POST["fecha"];
    $genero=$_POST["genero"];
    $result="";
    include_once("database.php");
    /* Si el campo de contraseña coincide con el de confirmar contraseña, añade un usuario nuevo a la tabla usuarios.
    Si estos no coinciden muestra un mensaje de error y lo redirige a la pagina de login*/
    if($pw==$confirmacion){
        $result["error"]="false";
        $registrar="INSERT INTO Continuara.usuarios
        (`correo`, `nombre`, `contrasena`, `nacimiento`, `genero`, `rutaImg`) VALUES ('$correo','$nombres','$pw','$fecha','$genero', 'img/default.png')";
        $comunicacion= mysqli_query($con,$registrar);

        //Luego selecciona el último usuario que se acabó de añadir
        $ultimoUsuario="SELECT usuarios.id AS idUsuario From Continuara.usuarios ORDER BY usuarios.id DESC LIMIT 1";
        $ultimo= mysqli_query($con,$ultimoUsuario);
        while($row=mysqli_fetch_array($ultimo)){
           $_SESSION["username"] = $row["idUsuario"];
       }
   }else{
    $result["error"]="true";
}

 echo  json_encode($result);
?>
