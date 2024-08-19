<HTML>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopcion CR</title>
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
        <form name="formulario_gatos" action="procesar_formulario.php" method="POST">

            <label for="nombre">
                <i class="fas fa-id-card"></i>
            </label>
            <input type="text" name="nombre" placeholder="Nombre" id="nombre" required>

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
                <i class="fas fa-envelope"></i>
            </label>
            <input type="email" name="correo" placeholder="Correo Electrónico" id="correo" required>

            <label for="Direccion">
                <i class="fas fa-map-marker-alt"></i>
            </label>
            <input type="text" name="Direccion" placeholder="Dirección" id="Direccion" required>

            <label for="Edad">
                <i class="fas fa-calendar-alt"></i>
            </label>
            <input type="number" name="Edad" placeholder="Edad" id="Edad" required>

            <label for="Ocupacion">
                <i class="fas fa-briefcase"></i>
            </label>
            <input type="text" name="Ocupacion" placeholder="Ocupación" id="Ocupacion" required>

            <label for="Propiedad_De_Vivienda">
                <i class="fas fa-key"></i>
            </label>
            <input type="text" name="Propiedad_De_Vivienda" placeholder="Propiedad de Vivienda (S/N)" id="Propiedad_De_Vivienda" required>

            <label for="Necesidades_Especiales">
                <i class="fas fa-notes-medical"></i>
            </label>
            <input type="text" name="Necesidades_Especiales" placeholder="Necesidades Especiales" id="Necesidades_Especiales" required>

            <label for="ID_Gato">
                <i class="fas fa-cat"></i>
            </label>
            <input type="number" name="ID_Gato" placeholder="ID del Gato" id="ID_Gato" required>

            <input type="submit" name="enviar_formulario" id="enviar_formulario" value="Enviar formulario">
        </form>
    </div>
</body>
</HTML>