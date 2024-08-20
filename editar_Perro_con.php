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
 

 $ID_Perro = $_POST["ID_Perro"];
 $Nombre = $_POST['Nombre'];
 $Genero = $_POST['Genero'];
 $Tamano = $_POST['Tamano'];
 $Numero_Contacto = $_POST['Numero_Contacto'];
 $Edad = $_POST['Edad'];
 $Necesidades_Especiales = $_POST['Necesidades_Especiales'];
 $Comportamiento = $_POST['Comportamiento'];
 $Imagen = $_POST['Imagen'];

$sql="UPDATE tab_perros SET Nombre='$Nombre',
            Genero='$Genero', Tamano='$Tamano',
            Numero_Contacto='$Numero_Contacto', 
            Edad='$Edad', 
            Necesidades_Especiales='$Necesidades_Especiales', 
            Comportamiento='$Comportamiento', 
            Imagen='$Imagen' 
            WHERE ID_Perro='$ID_Perro'";
$query = mysqli_query($conn, $sql);

if($query){
    Header("Location: adopcionPerros.php");
}else{

}

?>