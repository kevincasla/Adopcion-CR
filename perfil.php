<?php

session_start();

if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');
    exit;
}

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

$stmt = $conexion->prepare('SELECT password, correo, nombre, apellido FROM usuario WHERE cedula = ?');

$stmt->bind_param('i', $_SESSION['cedula']);
$stmt->execute();
$stmt->bind_result($password, $correo, $nombre, $apellido);
$stmt->fetch();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adopción CR</title>
        <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1515002246390-7bf7e8f87b54?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); /* Ruta a tu imagen */
            background-size: cover; /* Escala la imagen para cubrir todo el fondo */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
        }
    </style>

        <link rel="stylesheet" href="css_inicio_sesion.css">
        <link rel="stylesheet" href="css_Adopcion.css">
        <link rel="stylesheet" href="css_proyecto.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body id="perfil">
    <header>
        <nav>
            <div class="logo">
                <link href='https://unpkg.com/css.gg@2.0.0/icons/css/user.css' rel='stylesheet'>
                <link rel="stylesheet" href="css_proyecto.css">
            </div>
            <ul class="nav-links">
                <li><a href="Proyecto.html"><svg xmlns="http://www.w3.org/2000/svg" height="40" width="100" viewBox="0 0 512 512"><path fill="#67c185" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/></svg></a></li>

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
                <a href="#">Registrarse/Iniciar sesión</a>
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
    
    <div class="login">
        <h1>Perfil de usuario</h1>

        <form action="autenticacion.php" method="post">
            
            <label for="password">
                <i class="fas fa-address-card"></i>
            </label>
            <input  disabled type="text" name="password" id="password" value="<?= $_SESSION['cedula'] ?>">

            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" disabled id="username" value="<?= $_SESSION['nombre']," ", $apellido?> ">
            
            <label for="username">
                <i class="fas fa-at"></i>
            </label>
            <input type="text" name="username" disabled id="username" value="<?= $correo?> ">

        </form>

    </div>

</body>

</html>