<?php
// Datos del formualrio
//isset verifica si se envio un dato 
//&& Post verifica si esta seccion quedo vacia
//int convierte el dato a un valor numerico
$cantidadA = isset($_POST["cantidadA"]) && $_POST["cantidadA"] !== "" ? (int)$_POST["cantidadA"] : 0;
$cantidadE = isset($_POST["cantidadE"]) && $_POST["cantidadE"] !== "" ? (int)$_POST["cantidadE"] : 0;
$cantidadN = isset($_POST["cantidadN"]) && $_POST["cantidadN"] !== "" ? (int)$_POST["cantidadN"] : 0;

$dinero     = $_POST["dinero"];
$peliculas  = $_POST["peliculas"];

// Calculos de precios
$precioA    = $cantidadA * 40;
$precioE    = $cantidadE * 30;
$precioN    = $cantidadN * 20;
$subtotal   = $precioA + $precioE + $precioN;
$entradas   = $cantidadA + $cantidadE + $cantidadN;

//Aplicación del descuento
if ($entradas > 5) {
    $descuento = $total * 0.10;
} else {
    $descuento = 0;
}

//Calculo de Total, faltante y cambio
$total    = $subtotal - $descuento;
$faltante = $total - $dinero; 
$cambio   = $dinero - $total;   


echo "<p>Confirma tu compra</p>";

// demostracion del dinero faltante y cambio
echo "<h1>Estado:</h1>";
if ($subtotal > $dinero) { 
    echo "<h3>Dinero insuficiente</h3>";
    echo "Faltante: Q$faltante<br>";
} else {
    echo "<h3>Compra realizada exitosamente</h3>";
    echo "Cambio: Q$cambio<br>";
}


// Peliculas y salas escogidas
switch ($peliculas) {
    case 1:
        echo "<h2>Sala 1</h2> Toy Story<br>";
        break;
    case 2:
        echo "<h2>Sala 2</h2> Toy Story 2<br>";
        break;
    case 3:
        echo "<h2>Sala 3</h2> Toy Story 3<br>";
        break;
    case 4:
        echo "<h2>Sala 4</h2> Toy Story 4<br>";
        break;
    case 5:
        echo "<h2>Sala 5</h2> Toy Story 5<br>";
        break;
}
echo "<br>";
echo "<br>";
// Resumen de toda la compra en la tabla

echo "<table>";
echo  "<tr>";
echo "<th> Entradas: </th>";
echo "<td> $entradas </td>";
echo "</tr>";
echo "<tr>";
echo "<th> Subtotal: </th>";
echo "<td> Q$subtotal.00 </td>";
echo "</tr>";
echo "<tr>";
echo "<th> Descuento: </th>";
echo "<td> Q$descuento.00 </td>";
echo "</tr>";
echo "<tr>";
echo "<th> Total a pagar: </th>";
echo "<td> Q$total.00 </td>";
echo "</tr>";
echo "</table>";


echo "<br>";
echo "<br>";
echo "Tipos de entrada:";
echo "<br>";
if ($cantidadA > 0) {
    echo " $cantidadA Adulto";
}
if ($cantidadE > 0) {
    echo "Estudiante: ";
}
if ($cantidadN > 0) {
    echo "Niño: $cantidadN";
}

echo "<br>";
echo "<br>";

// Tabla con la cantidad de tickets utilizando ciclos
echo "<table>";

for ($i = 1; $i <= $entradas; $i++) {
    echo "<tr>";
    echo "  <th>Ticket #$i</th>";
    echo "</tr>";
}
echo "</table>";


?>
<style>
table, th, td {
  border: 1px solid black;
  text-align:center;
}
</style>