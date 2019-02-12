<?php

$conector = new mysqli("localhost", "root", "", "liga");
if ($conector->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conector->connect_errno . ") " . $conector->connect_error;
} else {
    if(!empty($_GET['equipo'])){
        $idEquipo = $_GET['equipo'];
        $resultado2  = $conector->query("SELECT * FROM `equipo` WHERE `id_equipo` = $idEquipo");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Equipo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

<h2>Información Equipo Seleccionado</h2>

<table>
    <tr>
        <td><b>ID Equipo</b></td>
        <td><b>Nombre</b></td>
        <td><b>Ciudad</b></td>
        <td><b>Web</b></td>
        <td><b>Puntos</b></td>
    </tr>

    <?php 
        foreach ($resultado2 as $equipo) {
            echo "<tr>";
            echo "<td>"."<a href=jugadores.php?jugador=".$equipo['id_equipo'].">".$equipo['id_equipo']."</a></td>";
            echo "<td>".$equipo['nombre']." </td>";
            echo "<td>".$equipo['ciudad']."</td>";
            echo "<td>".$equipo['web']."</td>";
            echo "<td>".$equipo['puntos']."</td>";
            echo "</tr>";
        }
        echo "</table>";        
    ?>

</body>
</html>