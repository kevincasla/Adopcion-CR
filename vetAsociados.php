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
    <header>
        <nav>
            <div class="logo">
                <link href='https://unpkg.com/css.gg@2.0.0/icons/css/user.css' rel='stylesheet'>
                <link rel="stylesheet" href="css_proyecto.css">
            </div>
            <ul class="nav-links">
                <li><a href="Proyecto.html"><svg xmlns="http://www.w3.org/2000/svg" height="40" width="100" viewBox="0 0 512 512"><path fill="#67c185" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/></svg></a></li>
                <?php
                if ($_SESSION['loggedin'] !== FALSE) {
                    echo '<li><a href="perfil.php"><i class="fas fa-user"></i> Perfil</a></li>';
                } ?>
                <li class="dropdown">
                    <a href="#">Adopción</a>
                    <ul class="dropdown-content">
                        <li><a href="adopcionGatos.html">Adopción de Gatos</a></li>
                        <li><a href="adopcionPerros.html">Adopción de Perros</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Cuidados</a>
                    <ul class="dropdown-content">
                        <li><a href="cuidadosPerros.html">Cuidados de Perros</a></li>
                        <li><a href="cuidadosGatos.html">Cuidados de Gatos</a></li>
                        <li><a href="cuidadosGenerales.html">Cuidados Generales</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Veterinarios</a>
                    <ul class="dropdown-content">
                        <li><a href="#"></a></li>
                        <li><a href="vetAsociados.php">Veterinaros Asociados</a></li>
                    </ul> 
                </li>
                <li><a href="foro.html">Foro</a></li>
                <li class="dropdown">
                    <a href="#">Albergues</a>
                    <ul class="dropdown-content">
                        <li><a href="listaAlbergues.html">Lista de Albergues</a></li>
                        <li><a href="mapaAlbergues.html">Mapa de Albergues</a></li>
                    </ul>
                </li>
            </ul>
            <?php
            if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                echo '<div class="auth-button">
                <a href="inicioSesion.html">Registrarse/Iniciar sesión</a>
                </div>';
            }

            if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== false) {
                echo '<div class="auth-button">
                <a href="cerrar-sesion.php">Cerrar Sesión</a>
                </div>';
            }
            ?>
        </nav>
    </header>

    <?php
    // Realizar la consulta
    $sql = "SELECT * FROM Tab_Veterinarios";
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        echo '<div class="container">
                <h1>Veterinarios Asociados</h1>';

                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'si') {
                 echo '<div class="add-button-container">
                    <a href="agregar_veterinario.php" class="btn-add">Agregar Veterinario</a>
                </div>';
                }
        
                 echo '<div class="dog-list">';
    
        // Recorrer los resultados y mostrarlos
        while($row = $result->fetch_assoc()) {
            echo '<div class="dog-card">
                    <img src="' . $row["Imagen"] . '" alt="' . $row["Nombre_Vet"] . '">
                    <div class="dog-details">
                        <h2>Veterinaria ' . $row["Nombre_Vet"] . '</h2>
                        <p>Ubicación: ' . $row["Ubicacion"] . '</p>
                        <p>Horario: ' . $row["Horario"] . '</p>
                        <p>Teléfono: ' . $row["Telefono"] . '</p>
                        <p>Especialidad: ' . $row["Especialidad"] . '</p>
                        <br>
                         <div class="map-container">
                            <iframe src="' . $row["Frame_Mapa"] . '" width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>';
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'si') {
                     echo '<br>
                    <div class="card-actions">
                        <form action="editar_veterinario.php" method="get" style="display:inline;">
                            <input id="id" type="hidden" name="id" value="' . $row["ID_Vet"] . '">
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="eliminar_veterinario.php" method="get" style="display:inline;" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este veterinario?\');">
                            <input type="hidden" id="id" name="id" value="' . $row["ID_Vet"] . '">
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
        echo "<p>No hay veterinarios registrados.</p>";
    }
    ?>

</body>

</html>