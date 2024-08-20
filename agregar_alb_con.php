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
    

    $ID_Albergue = null;
    $Nombre_Albergue = $_POST['Nombre_Albergue'];
    $Ubicacion = $_POST['Ubicacion'];
    $Horario = $_POST['Horario'];
    $Imagen = $_POST['Imagen'];
    $Frame_Mapa = $_POST['Frame_Mapa'];

    $sql = "INSERT INTO tab_albergue VALUES('$ID_Albergue','$Nombre_Albergue','$Ubicacion','$Horario','$Imagen','$Frame_Mapa')";
    $query = mysqli_query($conn, $sql);

    if($query){
        Header("Location: listaAlbergues.php");
    }else{

    }

?>