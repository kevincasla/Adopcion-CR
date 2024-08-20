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
    
    $ID_Cuidado_Perro = null;
    $Titulo = $_POST['Titulo'];
    $Descripcion = $_POST['Descripcion'];
    $Desarollo = $_POST['Desarollo'];
    $Imagen = $_POST['Imagen'];

    $sql = "INSERT INTO tab_cuidado_perros VALUES('$ID_Cuidado_Perro','$Titulo','$Descripcion','$Desarollo','$Imagen')";
    $query = mysqli_query($conn, $sql);

    if($query){
        Header("Location: cuidadoPerros.php");
    }else{

    }

?>