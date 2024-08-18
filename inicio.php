<?php

// confirmar sesion
session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: proyecto.html');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopción de Mascotas</title>
    <link rel="stylesheet" href="css_proyecto.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
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

    <div class="hero">
        <div class="hero-text">
            <h1>Adopción</h1>
            <h2>Costa Rica</h2>
            <p>¡Bienvenidos a Adopción Costa Rica! Nuestra misión es
                conectar mascotas en busca de un hogar amoroso con
                familias que desean darles una segunda oportunidad.
                En nuestra página, encontrarás información sobre
                adopciones, consejos para el cuidado de mascotas y
                relatos inspiradores de adopciones exitosas.
                Únete a nosotros y ayuda a transformar la vida de estos
                maravillosos animales. ¡Juntos podemos hacer
                la diferencia!</p>
        </div>
    </div>
    <footer> 
        <nav class = footer style="color: #FFFEF9;">
            <h1 class = footer>Adopcion Costa Rica</h1>
        </nav>
    </footer>
</body>

</html>