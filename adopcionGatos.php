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

    <div class="container">
        <h1>Gatos en Adopción</h1>
        <?php
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== false) {
            echo '<div class="adopt-button" style="display: initial";>
               <a href="agregar_Gato.php" style="color: white;text-decoration-line: none;" ;="">Publicar mascota</a>
           </div>';
        }
        ?>

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
                    echo '        <p>Necesidad especial: ' . htmlspecialchars($row['Necesidades_Especiales']) . '</p>';
                    echo '    </div>';
                    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== false) {
                    echo '    <a href="adoptar_gatos_foro.php" class="adopt-button">¡Adóptame!</a>';
                    }
                    
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'si') {
                        echo '<br>
                       <div class="card-actions" style= "padding: inherit;">
                           <form action="editar_Gato.php" method="get" style="display:inline;">
                               <input id="id" type="hidden" name="id" value="' . $row["ID_Gato"] . '">
                               <button type="submit" class="btn btn-warning">Editar</button>
                           </form>
                           <form action="eliminar_Gato.php" method="get" style="display:inline;" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este gato?\');">
                               <input type="hidden" id="id" name="id" value="' . $row["ID_Gato"] . '">
                               <button type="submit" class="btn btn-danger">Eliminar</button>
                           </form>
                       </div>';
                    }
                    echo '</div>';
                    
                }
            }
            ?>
        </div>
    </div>
</body>

</html>