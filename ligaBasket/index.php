<?php

$conector = new mysqli("localhost", "root", "", "liga");
if ($conector->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conector->connect_errno . ") " . $conector->connect_error;
} else {
    $resultado = $conector->query("SELECT * FROM partido");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Índice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

<h2>Información Partidos</h2>

<table>
    <tr>
        <td><b>Número de partidos</b></td>
        <td><b>ID equipo local</b></td>
        <td><b>ID equipo visitante</b></td>
        <td><b>Resultado</b></td>
    </tr>

    <?php
        foreach ($resultado as $partido) {
            echo "<tr>";
            echo "<td>".$partido['id_partido']."</td>";
            echo "<td>"."<a href=equipo.php?equipo=".$partido['local'].">".$partido['local']."</a> </td>";
            echo "<td>"."<a href=equipo.php?equipo=".$partido['visitante'].">".$partido['visitante']."</a></td>";
            echo "<td>".$partido['resultado']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>

</body>
</html>

