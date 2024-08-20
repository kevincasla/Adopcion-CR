<?php
//foro con crud

//confirmar sesion
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: inicio.php');
    exit;
}

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
    

    $ID_Tema = $_GET['ID_Tema'];

    
    $sql="SELECT * FROM tab_temas_foro WHERE ID_Tema='$ID_Tema'";
    $query=mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($query);

    
    $sql2="SELECT * FROM tab_preguntas_respuestas WHERE ID_Tema='$ID_Tema'";
    $query2=mysqli_query($conn, $sql2);

    $row2=mysqli_fetch_array($query2);

    
    $stmt = $conn->prepare('SELECT password, correo, nombre, apellido FROM usuario WHERE cedula = ?');

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
    <title>Adopción CR</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .post {
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
            text-align: center; /* Alinea todo el contenido del post al centro */
        }
        .post img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto; /* Asegura que la imagen esté centrada */
        }
        .post-title {
            font-size: 24px;
            margin-top: 10px;
        }
        .post-description {
            font-size: 16px;
            margin: 10px 0;
        }
        .post-date {
            font-size: 14px;
            color: #888;
        }
        .response {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .response-input {
            flex: 1;
            padding: 8px;
            font-size: 16px;
            margin-right: 10px;
        }
        .response-button {
            padding: 8px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .response-button:hover {
            background-color: #0056b3;
        }
    </style>

    <link rel="stylesheet" href="css_Adopcion.css">
    <link rel="stylesheet" href="css_proyecto.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!--<script src="load-header.js" defer></script> -->
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
    <br>
    <div class="container">
        <div class="post">
            <img src="<?= $row['imagen']?>" alt="Imagen del post" width="400px" height="200px">
            <h2 class="post-title"><?= $row['Titulo']?></h2>
            <p class="post-description"><?= $row['Descripcion']?></p>
            <p class="post-date">Fecha de creación: <?= $row['Fecha_creacion']?></p>
        </div>


        <?php
        
        $result = $conn->query($sql2);

        if ($result->num_rows > 0) {
            // Recorrer los resultados y mostrar los datos
            

            while ($row3 = $result->fetch_assoc()) {
                echo '<div class="post" style="text-align: left;">';
                echo '        <p class="post-title">' . htmlspecialchars($row3['nombre_usuario']) . '</p>';
                echo '        <p class="post-description">' . htmlspecialchars($row3['Respuesta']) . '</p>';
                echo '        <p class="post-date"> Fecha de creación: ' . htmlspecialchars($row3['Fecha_creacion']) . '</p>';
                echo '</div>';

            }

        } else{
            echo "<p>No hay respuestas para este tema";
        }
        ?>

         <div class="response">
         <form name="agregar_respuesta" action="agregar_respuesta.php" method="POST">
            <input type="hidden" name="nombre_usuario" id="nombre_usuario" value="<?= $_SESSION['nombre'], " ", $apellido ?>">
            <input type="hidden" name="ID_Tema" id="ID_Tema" value="<?= $ID_Tema ?>">

            <input type="text" style="width: 900px;" class="response-input" name="Respuesta" id="Respuesta" placeholder="Escribe tu respuesta aquí...">
            
            <input class="response-button" type="submit" name="agregar_respuesta_btn"  id="agregar_respuesta_btn" value="Agregar Respuesta">

        </form>

        </div>
    </div>
    <br>
    
</body>

</html>