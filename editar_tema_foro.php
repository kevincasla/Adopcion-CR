<?php
//prueba de editar tema de foro
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
    

    $ID_Tema = $_GET['id'];

    
    $sql="SELECT * FROM tab_temas_foro WHERE ID_Tema='$ID_Tema'";
    $query=mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($query);

?>

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
        <h1>Actualizar Tema de Foro</h1>
        <form name="editar_tema_foro" action="editar_tema_con.php" method="POST">
            <input type="hidden" name="ID_Tema" id="ID_Tema" value="<?= $row['ID_Tema']?>">
            <label for="Titulo">
                <i class="fa-solid fa-heading"></i>
            </label>
            <input type="text" name="Titulo" placeholder="Título" id="Titulo" value="<?= $row['Titulo']?>" required>
            
            <label for="Descripcion">
                <i class="fa-solid fa-align-left"></i>
            </label>
            <input type="text" name="Descripcion" placeholder="Descripción" id="Descripcion" value="<?= $row['Descripcion']?>" required>

            <label for="imagen">
                <i class="fa-solid fa-image"></i>
            </label>
            <input type="text" name="imagen" placeholder="Imagen" id="imagen" value="<?= $row['imagen']?>" required>

            <input type="submit" name="agregar_tema_btn"  id="agregar_tema_btn" value="Editar tema">
        </form>

    </div>
</BODY>


</HTML>