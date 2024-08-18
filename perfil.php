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
            background-image: url('https://images.unsplash.com/photo-1515002246390-7bf7e8f87b54?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            /* Ruta a tu imagen */
            background-size: cover;
            /* Escala la imagen para cubrir todo el fondo */
            background-position: center;
            /* Centra la imagen */
            background-repeat: no-repeat;
            /* Evita que la imagen se repita */
        }
    </style>

    <link rel="stylesheet" href="css_inicio_sesion.css">
    <link rel="stylesheet" href="css_Adopcion.css">
    <link rel="stylesheet" href="css_proyecto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body id="perfil">
    <div id="header-placeholder"></div>
    <!--Cargamos el header-->
    <script>
        fetch('header.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('header-placeholder').innerHTML = data;
            });
    </script>

    <div class="login">
        <h1>Perfil de usuario</h1>

        <form action="autenticacion.php" method="post">

            <label for="password">
                <i class="fas fa-address-card"></i>
            </label>
            <input disabled type="text" name="password" id="password" value="<?= $_SESSION['cedula'] ?>">

            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" disabled id="username" value="<?= $_SESSION['nombre'], " ", $apellido ?> ">

            <label for="username">
                <i class="fas fa-at"></i>
            </label>
            <input type="text" name="username" disabled id="username" value="<?= $correo ?> ">

        </form>

    </div>

</body>

</html>