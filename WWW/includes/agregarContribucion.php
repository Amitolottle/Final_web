<?php session_start(); ?>
<html>
<head>
    <title>Registrando usuario</title>
    <meta charset="UTF-8">
</head>


<body>
    <?php
    $idHistoria =$_POST["idHistoriaActual"];
    $contenido =$_POST["contenidoCon"];
    include_once("database.php");
    $sqlContribucion="SELECT historias.cupos AS cupos, historias.contenido AS contenidoActual FROM Continuara.historias WHERE historias.id='".$idHistoria."'";
    $resContribucion= mysqli_query($con,$sqlContribucion);
      while($row=mysqli_fetch_array($resContribucion)){
        $sqlUsuario="SELECT usuarios.nombre AS nombre FROM Continuara.usuarios WHERE usuarios.id='".$_SESSION["username"]."'";
        $resUsuario=mysqli_query($con,$sqlUsuario);
        while ($rowUsuario=mysqli_fetch_array($resUsuario)) {
          $sqlAgregarTablaContri="INSERT INTO Continuara.colaboraciones(`idUsuario`, `idHistoria`, `contenido`) VALUES ('".$_SESSION["username"]."','".$idHistoria."','".$contenido."')";
          $resAgregarContri=mysqli_query($con,$sqlAgregarTablaContri);
            $sqlAgregar="UPDATE Continuara.historias SET `cupos`=".$row["cupos"]."-1 WHERE historias.id=".$idHistoria."";
         $resAgregar= mysqli_query($con,$sqlAgregar);
         //`contenido`='".$row["contenidoActual"].'  '.$rowUsuario["nombre"].'  '.$contenido."',
        }
      }
       echo"<meta http-equiv='refresh' content='0.5;url=/Final/home.php'>";
?>
</body></html>