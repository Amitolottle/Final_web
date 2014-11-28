<?php session_start(); ?>
   <?php
   $result="";
   include_once("database.php");
   $sqlTiempo="SELECT historias.id AS idHistoria, historias.tiempo AS tiempo FROM Continuara.historias WHERE historias.tiempo>0";
   $resTiempo = mysqli_query($con,$sqlTiempo);

      while ($row= mysqli_fetch_array($resTiempo)) {
        $sqlRestar="UPDATE Continuara.historias SET `tiempo`=".$row["tiempo"]."-1 WHERE historias.id=".$row["idHistoria"]."";
         $resRestar= mysqli_query($con,$sqlRestar);
      }
    ?>
