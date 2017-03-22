<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Ciudad</th>
        <th>Conferencia</th>
        <th>Division</th>
        <th>Borrar</th>
    </tr>
<?php 
include "dbNBA.php";
	$nba=new dbNBA();
	$tabla=$nba->devolverTodo();
	   foreach ($tabla as $key => $fila) {
	    echo "<tr>";                                  
	        echo "<td>".$fila["Nombre"];
	        echo "<td>".$fila["Ciudad"];
	        echo "<td>".$fila["Conferencia"];
	        echo "<td>".$fila["Division"];
	        echo "<td>"."<a href='borrar.php?Nombre=".$fila['Nombre']."&Ciudad=".$fila['Ciudad']."&Conferencia=".$fila['Conferencia']."&Division=".$fila['Division']."'>BORRAR</a>"."</td>";
	    echo "</tr>";   
	    }
	    echo "</table>";
?>
</body>
</html>