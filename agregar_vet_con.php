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
    

    $ID_Vet = null;
    $Nombre_Vet = $_POST['Nombre_Vet'];
    $Ubicacion = $_POST['Ubicacion'];
    $Horario = $_POST['Horario'];
    $Telefono = $_POST['Telefono'];
    $Especialidad = $_POST['Especialidad'];
    $Imagen = $_POST['Imagen'];
    $Frame_Mapa = $_POST['Frame_Mapa'];

    $sql = "INSERT INTO tab_veterinarios VALUES('$ID_Vet','$Nombre_Vet','$Ubicacion','$Horario','$Telefono','$Especialidad','$Imagen','$Frame_Mapa')";
    $query = mysqli_query($conn, $sql);

    if($query){
        Header("Location: vetAsociados.php");
    }else{

    }

?>