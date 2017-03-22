<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="test.css">
  </head>
  <body>
  <!required,placeholder...  name  $_POST || $_GET      redireccionar todo a index.php s pued">
  <section>
    <article class="medio">
      <form class="" action="actualizarDB.php" method="post">
        <h1>Actualiza el equipo</h1>
        <input type="text" name="nombre" value="<?=$_GET["Nombre"]?>" readonly="readonly">
        <input type="text" name="ciudad" value="<?=$_GET["Ciudad"]?>" placeholder="Introduce una Ciudad"><br><br>
        <input type="text" name="conferencia" value="<?=$_GET["Conferencia"]?>" placeholder="Introduce una Conferencia"><br><br>
        <input type="text" name="division" value="<?=$_GET["Division"]?>" placeholder="Introduce una Division"><br><br>
        <input type="submit" name="" value="actualizar">
      </form>
    </article>
  </section>
  </body>
</html>