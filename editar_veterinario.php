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
    <header>
        <nav>
            <div class="logo">
                <link href='https://unpkg.com/css.gg@2.0.0/icons/css/user.css' rel='stylesheet'>
                <link rel="stylesheet" href="css_proyecto.css">
            </div>
            <ul class="nav-links">
                <li><a href="Proyecto.html"><svg xmlns="http://www.w3.org/2000/svg" height="40" width="100" viewBox="0 0 512 512"><path fill="#67c185" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/></svg></a></li>
                <li class="dropdown">
                    <a href="#">Adopción</a>
                    <ul class="dropdown-content">
                        <li><a href="adopcionGatos.html">Adopción de Gatos</a></li>
                        <li><a href="adopcionPerros.html">Adopción de Perros</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Cuidados</a>
                    <ul class="dropdown-content">
                        <li><a href="cuidadosPerros.html">Cuidados de Perros</a></li>
                        <li><a href="cuidadosGatos.html">Cuidados de Gatos</a></li>
                        <li><a href="cuidadosGenerales.html">Cuidados Generales</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Veterinarios</a>
                    <ul class="dropdown-content">
                        <li><a href="#"></a></li>
                        <li><a href="vetAsociados.php">Veterinaros Asociados</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Albergues</a>
                    <ul class="dropdown-content">
                        <li><a href="listaAlbergues.html">Lista de Albergues</a></li>
                        <li><a href="mapaAlbergues.html">Mapa de Albergues</a></li>
                    </ul>
                </li>
            </ul>
            <div class="auth-button">
                <a href="inicioSesion.html">Registrarse/Iniciar sesión</a>
            </div>
        </nav>
    </header>
   
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