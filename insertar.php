<?php 
spl_autoload_register( function ($nombre_clase) 
{
    include $nombre_clase . '.php';
});

$campos = array('codigo', 'descripcion', 'precio', 'stock');
$valores = array(
                array(1, 'Calcetines rojos', 1000, 6),
                array(2, 'Calcetines verdes de invierno', 5000, 7),
                array(3, 'Calcetines negros de polar', 5500, 20),
                array(4, 'Pack calzonsillos negros', 4500, 3),
                array(5, 'Cacelines blancos cortos', 1200, 1),
                array(6, 'Cacelines blancos largos', 1800, 12),
                array(7, 'Cacelines negros cortos', 1500, 9),
                array(8, 'Cacelines amarillos cortos', 1120, 9),
                array(9, 'Cacelines amarillos largos', 4000, 3),
                array(10, 'Cacelines azules cortos', 3900, 6)
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