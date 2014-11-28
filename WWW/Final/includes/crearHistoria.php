<?php session_start(); ?>
    <?php
    $titulo =$_POST["titulo"];
    $tipo =$_POST["tipo"];
    $genero =$_POST["genero"];
    $contenido =$_POST["contenido"];
    $tiempo="";
    $cupos="";
    if ($tipo=="cuento corto") {
        $tiempo="1440";/*en minutos 24 horas*/
        $cupos="4";
    } else if ($tipo=="cuento medio") {
        $tiempo="2160";
        $cupos="6";
    }else if ($tipo=="cuento largo") {
        $tiempo="5760";
        $cupos="10";
    }else{
        $tiempo="10080";
        $cupos="20";
    }
    /*Falta, un sql para traer el nombre del usuario y la imagen*/
    include_once("database.php");
    $infousuario="SELECT Continuara.usuarios.nombre, Continuara.usuarios.rutaImg FROM Continuara.usuarios WHERE Continuara.usuarios.id =".$_SESSION["username"]."";
    $sqlInforUsuario=mysqli_query($con,$infousuario);
    $nombre = '';
    $img = '';
    while ($row = mysqli_fetch_array($sqlInforUsuario)) {
        $nombre = $row['nombre'];
        $img = $row['rutaImg'];
        # code...
    }
  
    $crearhistoria="INSERT INTO Continuara.historias(`titulo`, `tipo`, `categoria`, `tiempo`, `contenido`, `idUsuario`, `creador`, `cupos`, `imgCreador`) VALUES ('$titulo','$tipo','$genero','$tiempo','$contenido','".$_SESSION["username"]."','$nombre','$cupos','$img')";
    $comunicacion= mysqli_query($con,$crearhistoria);

?>