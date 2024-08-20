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
        <h1>Cuidados para los Gatos</h1>
        <?php
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== false) {
            echo '<div class="adopt-button" style="display: initial; margin: 100px";>
               <a href="agregar_Cuidado_Gato.php" style="color: white;text-decoration-line: none;" ;="">Agregar cuidado</a>
           </div>';
        }
        ?>
        <div class="cuidados-list" style = "margin-top: 20px;">
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
            $sql = 'SELECT ID_Cuidado_Gato, Titulo, Descripcion, Desarrollo, Imagen FROM TAB_CUIDADO_GATOS';
            $result = $conexion->query($sql);

            // Verificar si se obtuvieron resultados
            if ($result->num_rows > 0) {
                // Recorrer los resultados y mostrar los datos
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="cuidados-card">';
                    echo '    <img src="' . htmlspecialchars($row['Imagen']) . '">';
                    echo '    <div class="dog-details">';
                    echo '        <h2>' . htmlspecialchars($row['Titulo']) . '</h2>';
                    echo '        <p>' . htmlspecialchars($row['Descripcion']) . '</p>';
                    echo '        <p>' . htmlspecialchars($row['Desarrollo']) . '</p>';
                    echo '    </div>';
                    echo '    <a href="adopcionGatos.php" class="adopt-button">Quiero adoptar!</a>';
                        
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'si') {
                        echo '<br>
                       <div class="card-actions" style= "padding: inherit;">
                           <form action="editar_Cuidado_Gatos.php" method="get" style="display:inline;">
                               <input id="id" type="hidden" name="id" value="' . $row["ID_Cuidado_Gato"] . '">
                               <button type="submit" class="btn btn-warning">Editar</button>
                           </form>
                           <form action="eliminar_Cuidado_Gato.php" method="get" style="display:inline;" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este cuidado?\');">
                               <input type="hidden" id="id" name="id" value="' . $row["ID_Cuidado_Gato"] . '">
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