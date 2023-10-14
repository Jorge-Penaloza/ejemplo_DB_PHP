<?php 
spl_autoload_register( function ($nombre_clase) 
{
    include $nombre_clase . '.php';
});

$campos = array(  'stock');
$valores = array(  20 );

$conexion = new dB();
if($conexion->actualizar('articulos',$campos,$valores,"codigo = 5"))
    echo "modificado";
else
    echo "No modificado";
echo "<br>";
?>