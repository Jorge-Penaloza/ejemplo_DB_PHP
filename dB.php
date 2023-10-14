<?php 
class dB
{    
    private $host   = "localhost";
    private $usuario = "root";
    private $pass  = "";
    private $db     = "artículos_de_limpieza";
    public $conexion;
    public function __construct()
    {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->pass,$this->db) or die(mysql_error());
        $this->conexion->set_charset("utf8");
    }

    public function insertar($tabla, $campos, $datos)
    {
        # Ejemplo
        # INSERT INTO `articulos` (`codigo`, `descripcion`, `precio`, `stock`) VALUES ('1', '1', '1', '1')
        $query = "INSERT INTO ";
        $query .= $tabla;
        $query .= " (`";
        $query .= implode("`,`", $campos);
        $query .= "`) VALUES ('";
        $query .= implode("','", $datos);
        $query .= "');";
        $resultado =    $this->conexion->query($query) or die($this->conexion->error);
        if($resultado)
            return true;
        return false;
    } 

    public function buscar($tabla, $campos = null,$condicion = null)
    {
        $query = "SELECT ";
        if($campos == null)
        {
            $query .= " * ";
        }
        else 
        {
            $query .= " `";
            $query .= implode("`,`", $campos);
            $query .= "`"; 
        }
        $query .= " FROM ";
        $query .= $tabla;
        $query .= " WHERE ";
        if($condicion == null)
        {
            $query .= " 1";
        }
        else
        {
            $query .= $condicion;
        }
        
        #echo $query;
        $resultado = $this->conexion->query($query) or die($this->conexion->error);
        if($resultado)
            return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    } 

    public function buscarTodo($tabla)
    {
        $query = "SELECT * FROM ".$tabla." WHERE 1";
        $resultado = $this->conexion->query($query) or die($this->conexion->error);
        if($resultado)
            return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    } 

    public function actualizar($tabla, $campos, $valores, $condicion)
    {    
        #"UPDATE $tabla SET $campos WHERE $condicion"
        $query = "UPDATE ";
        $query .= $tabla;
        $query .= " SET ";
        if(count($campos) == count($valores))
        {
            $sw = false;
            foreach ( array_combine( $campos, $valores) as $nombre => $valor) 
            {
                if ($sw) 
                    $query .= ",";
                
                $query .= "`".$nombre."` = '".$valor."' " ;
                $sw = true;
            }
            
        }
        
        $query .= " WHERE ";
        $query .= $condicion;
        #echo $query;
        $resultado  =   $this->conexion->query($query) or die($this->conexion->error);
        
        if($resultado)
            return true;
        return false;        
    } 

    public function borrar($tabla, $condicion)
    {    
        $query = "DELETE FROM ".$tabla." WHERE ".$condicion;
        #echo $query;
        $resultado  =   $this->conexion->query($query) or die($this->conexion->error);
        if($resultado)
            return true;
        return false;
    }
}
?>