<?php 
include "database.php";

$result = "";
$tmp = [];

$query = "SELECT historias.id AS idHistoria, historias.cupos AS cupos, historias.imgCreador AS imagen, 
historias.tiempo AS tiempo, historias.titulo AS titulo, historias.creador AS creador, historias.contenido AS contenido, 
historias.tipo AS tipo, historias.categoria AS categoria FROM Continuara.historias WHERE categoria='Improvisar'";

// "SELECT plumas.id FROM Continuara.plumas WHERE plumas.idHistoria='".$rowHistorias["idHistoria"]."'";
$resultado=mysqli_query($con,$query);

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

$result["error"] = false;
$result["historia"] = $tmp;

echo json_encode($result);

?>