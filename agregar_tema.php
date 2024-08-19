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

    $ID_Tmea = null;
    $Titulo = $_POST['Titulo'];
    $Descripcion = $_POST['Descripcion'];
    $Fecha_creacion = null;

    $sql = "INSERT INTO tab_temas_foro VALUES('$Titulo','$Descripcion')";
    $query = mysqli_query($conn, $sql);
?>