<?php session_start(); ?>
<?php
  include_once('database.php');

  //Query para preguntar cuales son las solicitudes que tiene pendiente por aprobar el usuario
  $result="";
  $temporal=[];
  $nombreUsuario="";
  $query = "SELECT * FROM Continuara.permisos WHERE permisos.permiso='verdadero' and permisos.idParticipante ='".$_SESSION["username"]."'";
  $resultado = mysqli_query($con,$query);
  
  while ( $row = mysqli_fetch_array($resultado) ) {
   // $queryNombre = "SELECT usuarios.nombre FROM Continuara.usuarios 
   // WHERE usuarios.id='".$row["idUsuario"]."'";
   // $resultNombre = mysqli_query($con,$queryNombre);
   // echo  $queryNombre ;
   // while ( $rowNomb = mysqli_fetch_array($resultNombre) ) {
   //   $nombreUsuario = $rowNomb["nombre"];
   // }
    //$temp['id'] = $row["id"];
    //$temp['idUsuario'] = $nombreUsuario;
    $temp['idUsuario'] = $row["idUsuario"];
    $temp['idHistoria'] = $row["idHistoria"];
    $temp['permiso'] = $row["permiso"];
    array_push($temporal,$temp);
  }
  //$result["error"] = false;
  $result["temp"] = $temporal;
  echo json_encode($result);

  ?>