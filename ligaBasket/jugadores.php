<?php

$conexion = new mysqli("localhost", "root", "", "liga");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
} else {
    if(!empty($_GET['jugador'])){
        $idJugador = $_GET['jugador'];
        $resultado3  = $conexion->query("SELECT * FROM `jugador` WHERE `equipo` = $idJugador");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Jugadores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
</head>
<body>

<h2>Jugadores del equipo</h2>

<table>
    <tr>
        <td><b>ID Jugador</b></td>
        <td><b>Nombre</b></td>
        <td><b>Apellido</b></td>
        <td><b>ID_Capitan</b></td>
        <td><b>Fecha alta</b></td>
        <td><b>Salario</b></td>
        <td><b>Altura</b></td>
        <td><b>Posición</b></td>
    </tr>


    <?php
        foreach ($resultado3 as $jugador) {
            echo "<tr>";
            echo "<td>".$jugador['id_jugador']."</td>";
            echo "<td>".$jugador['nombre']."</td>";
            echo "<td>".$jugador['apellido']." </td>";
            echo "<td>".$jugador['id_capitan']."</td>";
            echo "<td>".$jugador['fecha_alta']."</td>";
            echo "<td>".$jugador['salario']."</td>";
            echo "<td>".$jugador['altura']."</td>";

            if ($jugador['posicion'] == "Base") {
                echo "<td><b>".$jugador['posicion']."</b></td>";

            } else {
            echo "<td>".$jugador['posicion']."</td>";
            }

            echo "</tr>";

        }
        echo "</table>";
    ?>

</body>
</html>