<?php session_start(); ?>
    <?php
    $idHistoria =$_POST["idHistoriaActual"];
    $contenido =$_POST["contenidoCom"];
    include_once("database.php");
    $sqlComentario="INSERT INTO Continuara.comentarios (`idUsuario`, `idHistoria`, `contenido`) VALUES ('".$_SESSION["username"]."','".$idHistoria."'
      ,'".$contenido."')";
$resComentario=mysqli_query($con,$sqlComentario);
       echo"<meta http-equiv='refresh' content='0.5;url=/Final/visualizacion.php?idHistoria=".$idHistoria."'>";
?>
