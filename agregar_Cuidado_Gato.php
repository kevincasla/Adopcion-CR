<HTML>

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adopción CR</title>
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
        <h1>Agregar Cuidado de Gatos</h1>
        <form name="agregar_cuidado" action="agregar_Cuidado_Gato_con.php" method="POST">
       
            <label for="Titulo">
                <i class="fas fa-id-card"></i>
            </label>
            <input type="text" name="Titulo" placeholder="Titulo" id="Titulo" required>
            
            <label for="Descripcion">
                <i class="fa-solid fa-venus-mars"></i>
            </label>
            <input type="text" name="Descripcion" placeholder="Descripcion" id="Descripcion" required>

            <label for="Desarrollo">
                <i class="fa-solid fa-ruler"></i>
            </label>
            <input type="text" name="Desarrollo" placeholder="Desarrollo" id="Desarrollo" required>

            <label for="Imagen">
            <i class="fa-solid fa-image"></i>
            </label>
            <input type="text" name="Imagen" placeholder="Link de la imagen" id="Imagen" required>

            <input type="submit" name="agregar_gato_btn"  id="agregar_gato_btn" value="Agregar cuidado">
        </form>

    </div>
</BODY>
</HTML>