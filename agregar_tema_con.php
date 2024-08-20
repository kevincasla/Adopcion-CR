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

    $ID_Tema = null;
    $Titulo = $_POST['Titulo'];
    $Descripcion = $_POST['Descripcion'];
    $Fecha_creacion = null;
    $imagen = $_POST['imagen'];

    $sql = "INSERT INTO tab_temas_foro VALUES('$ID_Tema','$Titulo','$Descripcion', CURRENT_DATE,'$imagen')";
    $query = mysqli_query($conn, $sql);

    if($query){
        Header("Location: agregar_tema_foro.php");
    }else{

    }
?>