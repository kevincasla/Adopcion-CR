<?php

// confirmar sesion
session_start();


if (!isset($_SESSION['loggedin'])) {

    $_SESSION['loggedin'] = FALSE;
}


$servername = 'localhost:3307';
$username = 'root';
$password = "";
$database = 'adopcion_cr';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopción de Perros</title>
    <link rel="stylesheet" href="css_Adopcion.css">
    <link rel="stylesheet" href="css_proyecto.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!--<script src="load-header.js" defer></script> -->
</head>

<body>
<div id="header-placeholder"></div>
<!--Cargamos el header-->
    <script>
        fetch('header.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('header-placeholder').innerHTML = data;
            });
    </script>

    <?php
    // Realizar la consulta
    $sql = "SELECT * FROM tab_albergue";
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        echo '<div class="container">
                <h1>Albergues Asociados</h1>';

                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'si') {
                 echo '<div class="add-button-container">
                    <a href="agregar_albergue.php" class="btn-add">Agregar Albergue</a>
                </div>';
                }
        
                 echo '<div class="dog-list">';
    
        // Recorrer los resultados y mostrarlos
        while($row = $result->fetch_assoc()) {
            echo '<div class="vet-card">
                    <img src="' . $row["Imagen"] . '" alt="' . $row["Nombre_Albergue"] . '">
                    <div class="dog-details">
                        <h2>' . $row["Nombre_Albergue"] . '</h2>
                        <p>Ubicación: ' . $row["Ubicacion"] . '</p>
                        <p>Horario: ' . $row["Horario"] . '</p>
                        <br>
                         <div class="map-container">
                            <iframe src="' . $row["Frame_Mapa"] . '" width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>';
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'si') {
                     echo '<br>
                    <div class="card-actions">
                        <form action="editar_albergue.php" method="get" style="display:inline;">
                            <input id="id" type="hidden" name="id" value="' . $row["ID_Albergue"] . '">
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="eliminar_albergue.php" method="get" style="display:inline;" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este albergue?\');">
                            <input type="hidden" id="id" name="id" value="' . $row["ID_Albergue"] . '">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>';
                    }
                     echo '</div>
                  </div>';
        }
    
        echo '</div>
              </div>';
    } else {
        echo "<p>No hay albergues registrados.</p>";
    }
    ?>

</body>

</html>