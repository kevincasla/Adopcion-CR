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
    

    $ID_Perro = null;
    $Nombre = $_POST['Nombre'];
    $Genero = $_POST['Genero'];
    $Tamano = $_POST['Tamano'];
    $Numero_Contacto = $_POST['Numero_Contacto'];
    $Edad = $_POST['Edad'];
    $Necesidades_Especiales = $_POST['Necesidades_Especiales'];
    $Comportamiento = $_POST['Comportamiento'];
    $Imagen = $_POST['Imagen'];

    $sql = "INSERT INTO tab_perros VALUES('$ID_Perro','$Nombre','$Genero','$Tamano','$Numero_Contacto','$Edad','$Necesidades_Especiales','$Comportamiento','$Imagen')";
    $query = mysqli_query($conn, $sql);

    if($query){
        Header("Location: adopcionPerros.php");
    }else{

    }

?>