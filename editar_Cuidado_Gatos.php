<?php
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
    

    $ID_Cuidado_Gato = $_GET['id'];;

    
    $sql="SELECT * FROM tab_cuidado_gatos WHERE ID_Cuidado_Gato='$ID_Cuidado_Gato'";
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
        <h1>Actualizar Cuidado</h1>
        <form name="editar_cuidado" action="editar_Cuidado_Gatos_con.php" method="POST">
        <input type="hidden" name="ID_Cuidado_Gato" id="ID_Cuidado_Gato" value="<?= $row['ID_Cuidado_Gato']?>">
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

            <input type="submit" name="editar_cuidado_btn"  id="editar_cuidado_btn" value="Actualizar informacion">
        </form>

    </div>
</BODY>


</HTML>