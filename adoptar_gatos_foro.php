<?php

session_start();

if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');
    exit;
}

$ID_Gato = $_GET['ID_Gato'];

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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopcion CR</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1508112454086-9a507dc91f73?q=80&w=1746&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
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

    <div class="login">
        <h1>Formulario de Adopción de Gatos</h1>
        <form name="formulario_gatos" action="adoptar_gatos_con.php" method="POST">

            <label for="nombre">
                <i class="fas fa-id-card"></i>
            </label>
            <input type="text" name="nombre" placeholder="Nombre"  value="<?= $_SESSION['nombre'], " ", $apellido ?> " required readonly>

            <label for="Telefono">
                <i class="fa fa-phone"></i>
            </label>
            <input type="text" name="Telefono" placeholder="Teléfono" id="Telefono" required>

            <label for="Motivo">
                <i class="fas fa-info-circle"></i>
            </label>
            <input type="text" name="Motivo" placeholder="Motivo de Adopción" id="Motivo" required>

            <label for="Tipo_Vivienda">
                <i class="fas fa-home"></i>
            </label>
            <input type="text" name="Tipo_Vivienda" placeholder="Tipo de Vivienda" id="Tipo_Vivienda" required>

            <label for="Visitas_Hogar">
                <i class="fas fa-eye"></i>
            </label>
            <input type="text" name="Visitas_Hogar" placeholder="Visitas al Hogar" id="Visitas_Hogar" required>

            <label for="correo">
                <i class="fa-solid fa-envelope"></i>
            </label>
            <input type="text" name="correo" placeholder="Correo" id="correo" value="<?= $correo ?>" required readonly>

            <label for="Direccion">
                <i class="fa-solid fa-location-dot"></i>
            </label>
            <input type="text" name="Direccion" placeholder="Dirección" id="Direccion" required>

            <label for="Edad">
                <i class="fa-solid fa-calendar-days"></i>
            </label>
            <input type="text" name="Edad" placeholder="Edad" id="Edad" required>

            <label for="Ocupacion">
                <i class="fa-solid fa-briefcase"></i>
            </label>
            <input type="text" name="Ocupacion" placeholder="Ocupación" id="Ocupacion" required>

            <label for="Propiedad_De_Vivienda">
                <i class="fa-solid fa-house"></i>
            </label>
            <input type="text" name="Propiedad_De_Vivienda" placeholder="Propiedad de Vivienda" id="Propiedad_De_Vivienda" requiered>
            
            <label for="Necesidades_Especiales">
                <i class="fa-solid fa-person"></i>
            </label>
            <input type="text" name="Necesidades_Especiales" placeholder="Necesidades Especiales" id="Necesidads_Especiales" requiered>
            
            <input type="hidden" name="ID_Gato" id="ID_Gato" value="<?= $ID_Gato ?>">
            

            <input type="submit" href="adopcionGatos.php" name="enivar_solicitud_btn" id="enviar_solicitud_btn" value="Enviar solicitud">
        </form>
    </div>
</body>
</html>