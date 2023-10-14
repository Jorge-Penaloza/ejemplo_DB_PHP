<?php 
spl_autoload_register( function ($nombre_clase) 
{
    include $nombre_clase . '.php';
});

$campos = array('codigo', 'descripcion','precio','stock','categoria');
$conexion = new dB();
$condicion = "codigo = 1 or codigo = 2 or codigo = 3 or codigo = 4 or codigo = 5";
if($resultado=$conexion->buscar("articulos",$campos,$condicion))
{
    echo "<table>";
    echo "<tr>";
    foreach ($campos as $key => $value) 
    {
        echo "<th>".$value."</th>"; 
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($resultado as $fila)
    {
        $cadena = "<tr>";
        foreach ($campos as $key => $value) 
        {
            $cadena .= "<td>".$fila[$value]."</td>";
        }
        echo $cadena;
        echo "</tr>";
    }
    echo "</tr>";
    echo "</table>";
}
else
    echo  "No hay registros";

$condicion = "codigo = 1 or codigo = 2";
if($conexion->borrar("articulos",$condicion))
    echo "Borrado";
else
   echo "No borrado";
?>