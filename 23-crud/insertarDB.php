<!DOCTYPE html>
<html>
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
        //Incluimos clase, creamos nuevo objeto new, estructura de control para ver las posibilidades de post y imprimir con funciones y ARRAY, objeto-mysql-assoc   COLUMNAS? cabeceras?
        if (!empty($_POST['nombre']) && !empty($_POST['ciudad']) && !empty($_POST['conferencia']) && !empty($_POST['division'])){
            $resultadoInsert=$nba->insertarEquipos($_POST["nombre"],$_POST["ciudad"],$_POST["conferencia"],$_POST["division"]);
            //Devolver el equipo insertado ampliar por id...-->  select+insert+update+delete
              if($resultadoInsert==true){
                $tabla=$nba->devolverUltimoEquipo($_POST['nombre']);
                foreach ($tabla as $key => $fila) {
                	echo "<tr>";
                    echo "<td>".$fila["Nombre"]."</td>";
                    echo "<td>".$fila["Ciudad"]."</td>";
                    echo "<td>".$fila["Conferencia"]."</td>";
                    echo "<td>".$fila["Division"]."</td>";
                    echo "</tr>";
                	}
                echo "</table>";
               }
        }  
        //se puede ampliar a todas las casualidades pero se puede hacer desde el frontal
        elseif (empty($_POST['nombre']) && empty($_POST['ciudad']) && empty($_POST['conferencia']) && empty($_POST['division'])) {
				echo "no has introducido";
	            $tabla=$nba->devolverTodo();
	                foreach ($tabla as $key => $fila) {
	                echo "<tr>";                        
	                    echo "<td>".$fila["Nombre"]."</td>";
	                    echo "<td>".$fila["Ciudad"]."</td>";
	                    echo "<td>".$fila["Conferencia"]."</td>";
	                    echo "<td>".$fila["Division"]."</td>";
	                echo "</tr>";   
	                }
	                echo "</table>";
        }
        echo "<a href='actualizar.php?Nombre=".$fila["Nombre"]."&Ciudad=".$fila["Ciudad"]."&Conferencia=".$fila["Conferencia"]."&Division=".$fila["Division"]."'>Actualizar Registro</a>";
        echo "<br>";
        echo "<a href='borrar.php?Nombre=".$fila["Nombre"]."'>Borrar Registro</a>";
        echo "<br>";
        //buscado se puede hacer con J.S xd
       $botonAtras = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$botonAtras'>Volver</a>.<br>";
?>
</body>
</html>