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
    

    $ID_Vet = $_GET['id'];;

    
    $sql="SELECT * FROM tab_veterinarios WHERE ID_Vet='$ID_Vet'";
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
        <h1>Actualizar Veterinario</h1>
        <form name="editar_vet" action="editar_vet_con.php" method="POST">
            <input type="hidden" name="ID_Vet" id="ID_Vet" value="<?= $row['ID_Vet']?>">
            <label for="Nombre_Vet">
                <i class="fas fa-id-card"></i>
            </label>
            <input type="text" name="Nombre_Vet" placeholder="Nombre" id="Nombre_Vet" value="<?= $row['Nombre_Vet']?>" required>
            
            <label for="Ubicacion">
                <i class="fas fa-map-marked-alt"></i>
            </label>
            <input type="text" name="Ubicacion" placeholder="Ubicación" id="Ubicacion" value="<?= $row['Ubicacion']?>" required>

            <label for="Horario">
                <i class="fas fa-clock"></i>
            </label>
            <input type="text" name="Horario" placeholder="Horario" id="Horario" value="<?= $row['Horario']?>" required>

            <label for="Telefono">
                <i class="fa fa-phone"></i>
            </label>
            <input type="text" name="Telefono" placeholder="Teléfono" id="Telefono" value="<?= $row['Telefono']?>" required>

            <label for="Especialidad">
                <i class="fas fa-id-card-alt"></i>
            </label>
            <input type="text" name="Especialidad" placeholder="Especialidad" id="Especialidad" value="<?= $row['Especialidad']?>" required>

            <label for="Imagen">
                <i class="fas fa-image"></i>
            </label>
            <input type="text" name="Imagen" placeholder="Link de la Imagen" id="Imagen" value="<?= $row['Imagen']?>" required>
            
            <label for="Frame_Mapa">
                <i class="fas fa-map-marker-alt"></i>
            </label>
            <input type="text" name="Frame_Mapa" placeholder="Frame del Mapa" id="Frame_Mapa" value="<?= $row['Frame_Mapa']?>" required>

            <input type="submit" name="agregar_vet_btn"  id="agregar_vet_btn" value="Editar veterinario">
        </form>

    </div>
</BODY>


</HTML>