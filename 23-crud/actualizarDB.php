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
    </tr>
<?php 
include "dbNBA.php";
$nba=new dbNBA();
    if (!empty($_POST['nombre']) && !empty($_POST['ciudad']) && !empty($_POST['conferencia']) && !empty($_POST['division'])) {
        $actualizar=$nba->actualizarEquipo($_POST['nombre'],$_POST['ciudad'],$_POST['conferencia'],$_POST['division']);
        if ($actualizar==true) {
                $resultado=$nba->devolverUltimoEquipo($_POST['nombre']);
                   foreach ($resultado as $key => $fila) {
                    echo "<tr>";
                        echo "<td>".$fila["Nombre"]."</td>";
                        echo "<td>".$fila["Ciudad"]."</td>";
                        echo "<td>".$fila["Conferencia"]."</td>";
                        echo "<td>".$fila["Division"]."</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
        }
    }   else{
            echo "hay error";
        }
        echo "<a href='actualizar.php?Nombre=".$fila["Nombre"]."&Ciudad=".$fila["Ciudad"]."&Conferencia=".$fila["Conferencia"]."&Division=".$fila["Division"]."'>Actualizar Registro</a>";
        echo "<br>";
        echo "<a href='borrar.php?Nombre=".$fila["Nombre"]."'>Borrar Registro</a>";
?>
</body>
</html>