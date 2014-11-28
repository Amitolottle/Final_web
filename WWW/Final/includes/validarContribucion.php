<?php session_start(); ?>
  <?php
include_once("database.php");
  $idAlmacenado= $_POST["idHistoria"];
  $result="";
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
      /*hay que avisarle aqui al usuario que la solicitud fue creada*/
      $result["error"]="true";
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
      $result["error"]="false";
    } 
  }
    echo  json_encode($result);
 ?>