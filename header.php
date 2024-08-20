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

<header>
    <nav>
        <div class="logo">
            <link href='https://unpkg.com/css.gg@2.0.0/icons/css/user.css' rel='stylesheet'>
            <link rel="stylesheet" href="css_proyecto.css">
        </div>
        <ul class="nav-links">
            <li><a href="inicio.php"><svg xmlns="http://www.w3.org/2000/svg" height="40" width="100" viewBox="0 0 512 512">
                        <path fill="#67c185" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
                    </svg></a></li>

                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        ?>
                        <li><a style="color: green">¡Bienvenido, <?= $_SESSION['nombre'] ?>!</a></li>
                        <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['loggedin'] !== FALSE) {
                        echo '<li><a href="perfil.php"><i class="fas fa-user"></i> Perfil</a></li>';
                    } ?>

            <li class="dropdown">
                <a href="#">Adopción</a>
                <ul class="dropdown-content">
                    <li><a href="adopcionGatos.php">Adopción de Gatos</a></li>
                    <li><a href="adopcionPerros.php">Adopción de Perros</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Cuidados</a>
                <ul class="dropdown-content">
                    <li><a href="cuidadoPerros.php">Cuidados de Perros</a></li>
                    <li><a href="cuidadoGatos.php">Cuidados de Gatos</a></li>
                    <li><a href="cuidadoGeneral.php">Cuidados Generales</a></li>
                </ul>
            </li>
            <li><a href="vetAsociados.php">Veterinarios</a></li>
            <li><a href="foro.php">Foro</a></li>
            <li><a href="listaAlbergues.php">Albergues</a></li>
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