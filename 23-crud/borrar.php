<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>Equipo borrado :</h1>
<?php 
include "dbNBA.php";
	$nba=new dbNBA();
		if (isset($_GET["Nombre"])) {
			$resultadoBorrar=$nba->borrarEquipo($_GET["Nombre"]);
			if ($resultadoBorrar==true) {
			echo $_GET["Nombre"];
			}
		}
		else{
			echo "error en el borrado";
		}
		echo "<br>";
		echo "<a href='listaequipos.php'>Borrar mas Equipos</a>";
?>
</body>
</html>
