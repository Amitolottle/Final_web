<?php session_start(); ?>
<?php
include_once("database.php");
	$idAlmacenado= $_POST["idHistoria"];
	$sqlValidacion= "SELECT plumas.idHistoria FROM Continuara.plumas WHERE plumas.idHistoria='".$idAlmacenado."' AND plumas.idUsuario='".$_SESSION["username"]."'";
	$resValidacion=mysqli_query($con,$sqlValidacion);
	if(mysqli_num_rows($resValidacion)<1){
		$sql="INSERT INTO Continuara.plumas(`idUsuario`, `idHistoria`) VALUES ('".$_SESSION["username"]."','$idAlmacenado')";
		$comunicacion=mysqli_query($con,$sql);
	}
	echo"<meta http-equiv='refresh' content='0.5;url=/Final/home.php'>";
?>
