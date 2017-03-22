<?php
class dbNBA{
//conexion,usuario,contraseña,bbdd   objeto y control de errores....
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";
  private $conexion;
  private $error=false;
    //Constructor para conectar con bbdd en new
    function __construct(){
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno){
        $this->error=true;
      }
    }
    public function getErrorConexion(){
      return $this->error;
    }
    
    //function INSERCION contra la tabla equipos... $sqlInsercion objeto para insertar get-post        road a foreach para imprimir y en crud? insert update delete
    public function insertarEquipos($nombre,$ciudad,$conferencia,$division){
      if ($this->error==false){
        $sqlInsercion="INSERT INTO equipos(Nombre,Ciudad,Conferencia,Division) Values('".$nombre."','".$ciudad."','".$conferencia."','".$division."')";
        if (!$this->conexion->query($sqlInsercion)) {
        echo "Falló la insercion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
          return false;
        }
        return true;
      }else{
        return false;
      }
    }
    public function actualizarEquipo($nombre,$ciudad,$conferencia,$division){
      if ($this->error==false) {
            $sqlActualizar="UPDATE equipos SET Ciudad='".$ciudad."',Conferencia='".$conferencia."',Division='".$division."' WHERE Nombre='".$nombre."' ";
          
             if (!$this->conexion->query($sqlActualizar)) {
                echo "Falló la insercion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
                  return false;
              }else{
                return true;
              }
            
      }else{
          return false;
      }
    }
  //function devolver ultimo usuario inserrtado... no ha id...Nombre abajo filtrado,,,
    public function devolverUltimoEquipo($equipo){
      if ($this->error==false) {
    $resultado=$this->conexion->query("SELECT * FROM equipos WHERE Nombre = '".$equipo."' ");
      $tabla=[];
      $fila=$resultado->fetch_assoc();
      $tabla[]=$fila;
        return $tabla;
          }else{
        return null;
      }
    }
    public function devolverTodo(){
      if ($this->error==false) {
          $resultado=$this->conexion->query("SELECT * FROM equipos ");
          $tabla=[];
          while ($fila=$resultado->fetch_assoc()) {
            $tabla[]=$fila;
          }
          return $tabla;
      }else{
        return null;
      }
    }
    public function borrarEquipo($nombre){
        if($this->error==false){
          $deleteSql="DELETE FROM equipos WHERE Nombre='".$nombre."'";
            if (!$this->conexion->query($deleteSql)) {
              echo "Falló el borrado del usuario: (" . $this->conexion->errno . ") " . $this->conexion->error;
              return false;
            }else{
              return true;
            }
        }else{
          return false;
        }
    }
    //filtrado por ORDER BY id DESC LIMIT  id,Nombre...
    //  public function devolverUltimoJugador(){
    //   if ($this->error==false) {
    //     $resultado=$this->conexion->query("SELECT * FROM equipos ORDER BY Nombre DESC LIMIT 1");
    //     return $resultado;
    //       }else{
    //     return null;
    //   }
    // }
      
}
?>