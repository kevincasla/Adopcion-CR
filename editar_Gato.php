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
    

    $ID_Gato = $_GET['id'];;

    
    $sql="SELECT * FROM tab_gatos WHERE ID_Gato='$ID_Gato'";
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
        <h1>Actualizar Informacion del Gato</h1>
        <form name="editar_gato" action="editar_Gato_con.php" method="POST">
        <input type="hidden" name="ID_Gato" id="ID_Gato" value="<?= $row['ID_Gato']?>">
            <label for="Nombre">
                <i class="fas fa-id-card"></i>
            </label>
            <input type="text" name="Nombre" placeholder="Nombre" id="Nombre" value="<?= $row['Nombre']?>"required>
            
            <label for="Genero">
                <i class="fa-solid fa-venus-mars"></i>
            </label>
            <input type="text" name="Genero" placeholder="Macho/Hembra" id="Genero" value="<?= $row['Genero']?>" required>

            <label for="Tamano">
                <i class="fa-solid fa-ruler"></i>
            </label>
            <input type="text" name="Tamano" placeholder="Tamano" id="Tamano" value="<?= $row['Tamano']?>" required>

            <label for="Numero_Contacto">
                <i class="fa fa-phone"></i>
            </label>
            <input type="text" name="Numero_Contacto" placeholder="Teléfono de contacto:" id="Numero_Contacto" value="<?= $row['Numero_Contacto']?>" required>

            <label for="Edad">
                <i class="fas fa-id-card"></i>
            </label>
            <input type="text" name="Edad" placeholder="Edad" id="Edad" value="<?= $row['Edad']?>" required>

            <label for="Necesidades_Especiales">
                <i class="fa-solid fa-cat"></i>
            </label>
            <input type="text" name="Necesidades_Especiales" placeholder="Necesidades Especiales" id="Necesidades_Especiales" value="<?= $row['Necesidades_Especiales']?>" required>
            
            <label for="Comportamiento">
                <i class="fa-solid fa-cat"></i>
            </label>
            <input type="text" name="Comportamiento" placeholder="Comportamiento" id="Comportamiento" value="<?= $row['Comportamiento']?>" required>
            
            <label for="Imagen">
                <i class="fa-solid fa-image"></i>
            </label>
            <input type="text" name="Imagen" placeholder="Link de la imagen" id="Imagen" value="<?= $row['Imagen']?>" required>

            <input type="submit" name="editar_gato_btn"  id="editar_gato_btn" value="Actualizar informacion">
        </form>

    </div>
</BODY>


</HTML>