<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopción CR</title>
    <link rel="stylesheet" href="css_Adopcion.css">
    <link rel="stylesheet" href="css_proyecto.css">
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
    
    <div class="container">
        <h1>Gatos en Adopción</h1>
        <div class="dog-grid">
            <?php
            $DATABASE_HOST = 'localhost:3307';
            $DATABASE_USER = 'root';
            $DATABASE_PASS = '';
            $DATABASE_NAME = 'adopcion_cr';

            // conexion a la base de datos

            $conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

            if (mysqli_connect_error()) {
                // si se encuentra error en la conexión
                exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
            }
            // Preparar la consulta SQL
            $sql = 'SELECT ID_Gato, Nombre, Genero, Tamano, Numero_Contacto, Edad, Necesidades_Especiales, Comportamiento, Imagen FROM TAB_GATOS';
            $result = $conexion->query($sql);

            // Verificar si se obtuvieron resultados
            if ($result->num_rows > 0) {
                // Recorrer los resultados y mostrar los datos
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="dog-card">';
                    echo '    <img src="' . htmlspecialchars($row['Imagen']) . '" alt="' . htmlspecialchars($row['Nombre']) . '">';
                    echo '    <div class="dog-details">';
                    echo '        <h2>' . htmlspecialchars($row['Nombre']) . '</h2>';
                    echo '        <p>Edad: ' . htmlspecialchars($row['Edad']) . ' años</p>';
                    echo '        <p>Género: ' . htmlspecialchars($row['Genero']) . '</p>';
                    echo '        <p>Tamaño: ' . htmlspecialchars($row['Tamano']) . '</p>';
                    echo '        <p>Número de contacto: ' . htmlspecialchars($row['Numero_Contacto']) . '</p>';
                    echo '    </div>';
                    echo '    <a href="#" class="adopt-button">¡Adóptame!</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>