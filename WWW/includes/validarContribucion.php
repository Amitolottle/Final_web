<!-- Inicio sesión de nuevo para acceder al dato del ID ya almacenado -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <title>>Log In</title>
	  <meta name="description" content="">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/main.css">

	  <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
  <?php
include_once("database.php");
if(isset($_GET["idHistoria"])){ 
  $idAlmacenado= $_GET["idHistoria"];
  /*Se busca en las solicitudes si existe una que tenga el id de la historia y el id del usuario Session*/
  $sqlValidarReq = "SELECT * FROM Continuara.permisos WHERE permisos.idHistoria = ".$idAlmacenado." 
  AND permisos.idParticipante = '".$_SESSION["username"]."'";
  $resValidarReq=mysqli_query($con, $sqlValidarReq);
  if (mysqli_num_rows($resValidarReq)<=0) {
    /*Si no la hay, se crea*/
    /*Aqui puede evaluarse los cupos*/
      $sqlVerHistoria = "SELECT historias.idUsuario AS idUsuario FROM Continuara.historias WHERE historias.id = ".$idAlmacenado."";
      $resVerHistoria = mysqli_query($con, $sqlVerHistoria);
      $idCreador = "";
      while ($row = mysqli_fetch_array($resVerHistoria)) {
        $idCreador = $row["idUsuario"];
      }
      $sqlCrearSolicitud = "INSERT INTO Continuara.permisos(`idParticipante`, `idUsuario`, `idHistoria`, `permiso`) VALUES ('".$_SESSION["username"]."',
        ".$idCreador.",".$idAlmacenado.",'falso')";
        //echo"".$sqlCrearSolicitud."";
      $comCrearSolicitud = mysqli_query($con, $sqlCrearSolicitud);
      echo"<meta http-equiv='refresh' content='4;url=/Final/home.php'>";
      echo"<h1>Has enviado una solicitud, espera a que esta sea aprobada por el creador de la historia</h1>";
      /*hay que avisarle aqui al usuario que la solicitud fue creada*/
  } else {
    /*Si la hay, se evalua si ha sido aprovada o no*/
    $sqlValidarPermiso = "SELECT permisos.permiso AS permiso FROM Continuara.permisos WHERE permisos.idHistoria = ".$idAlmacenado." 
    AND permisos.idParticipante = '".$_SESSION["username"]."'";
    $resValidarPermiso = mysqli_query($con, $sqlValidarPermiso);
    $valorPermiso = "";
      while ($row = mysqli_fetch_array($resValidarPermiso)) {
        $valorPermiso = $row["permiso"];
      }
    if ($valorPermiso == "falso") {
      /*si no ha sido aprovada se le dice al usuario que no ha sido aprovada*/
      echo"<meta http-equiv='refresh' content='4;url=/Final/home.php'>";
      echo "Su solicitud aun no ha sido aprovada";
    } else {
      echo"<meta http-equiv='refresh' content='0.5;url=/Final/contribuir.php?idHistoria=".$idAlmacenado."'>";
    }

  }

}
 ?>
	</body>
</html>