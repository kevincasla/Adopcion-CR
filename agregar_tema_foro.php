<HTML>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopcion CR</title>
    <link rel="stylesheet" href="css_inicio_sesion.css">
    <link rel="stylesheet" href="css_Adopcion.css">
    <link rel="stylesheet" href="css_proyecto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <h1>Agregar Tema</h1>
        <form name="agregar_tema" action="agregar_tema_con.php" method="POST">

            <label for="Titulo">
                <i class="fas fa-heading"></i>
            </label>
            <input type="text" name="Titulo" placeholder="Título del tema" id="Titulo" required>

            <label for="Descripcion">
                <i class="fas fa-align-left"></i>
            </label>
            <input type="text" name="Descripcion" placeholder="Descripción del tema" id="Descripcion" required>

            <label>
                <i class="fa-solid fa-image"></i> 
            </label> 
            <input type="text" name="imagen" placeholder="Imagen" id="imagen" required>

            <input type="submit" href="foro.html" name="agregar_tema_btn" id="agregar_tema_btn" value="Agregar tema">
        </form>

    </div>
</body>

</HTML>
