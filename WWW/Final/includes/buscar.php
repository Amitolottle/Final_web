<?php

$palabra =$_POST["palabra"];
$result="";
$tmp = [];

include_once("database.php");

$validar= "SELECT historias.id AS idHistoria, historias.cupos AS cupos, historias.imgCreador AS imagen, 
historias.tiempo AS tiempo, historias.titulo AS titulo, historias.creador AS creador, historias.contenido AS contenido, 
historias.tipo AS tipo, historias.categoria AS categoria FROM Continuara.historias WHERE creador='$palabra'";

$resultado = mysqli_query($con,$validar);

while ($row = mysqli_fetch_array($resultado)){
  $historia["idHistoria"] = $row["idHistoria"];
  $historia["cupos"] = $row["cupos"];
  $historia["imagen"] = $row["imagen"];
  $historia["tiempo"] = $row["tiempo"];
  $historia["titulo"] = $row["titulo"];
  $historia["creador"] = $row["creador"];
  $historia["contenido"] = $row["contenido"];
  $historia["tipo"] = $row["tipo"];
  $historia["categoria"] = $row["categoria"];

  $sqlPlumas="SELECT plumas.id FROM Continuara.plumas WHERE plumas.idHistoria='".$row["idHistoria"]."'";
  $resPlumas=mysqli_query($con,$sqlPlumas);
  $historia["plumas"]=mysqli_num_rows($resPlumas);

  array_push($tmp, $historia);
}
if(sizeof($tmp)>=1){
$result["error"] = false;
$result["historia"] = $tmp;
}else{
$result["error"] = true;
}
echo  json_encode($result);
?>
