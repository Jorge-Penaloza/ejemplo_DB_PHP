<?php 
spl_autoload_register( function ($nombre_clase) 
{
    include $nombre_clase . '.php';
});

$campos = array('codigo', 'descripcion', 'precio', 'stock','categoria');
$valores = array(
                array(11, 'Calcetines morados largos', 1000, 26,'Ropa de invierno'),
                array(12, 'Calcetines morados cortos', 5000, 27,'Ropa de verano'),
                );

$conexion = new dB();
foreach ($valores as $key => $value) 
{
    if($conexion->insertar('articulos',$campos,$value))
        echo "Insertado";
    else
        echo "No insertado";
    echo "<br>";
}
?>