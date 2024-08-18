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
 

$ID_Vet = $_POST["ID_Vet"];
$Nombre_Vet = $_POST['Nombre_Vet'];
$Ubicacion = $_POST['Ubicacion'];
$Horario = $_POST['Horario'];
$Telefono = $_POST['Telefono'];
$Especialidad = $_POST['Especialidad'];
$Imagen = $_POST['Imagen'];
$Frame_Mapa = $_POST['Frame_Mapa'];

$sql="UPDATE tab_veterinarios SET Nombre_Vet='$Nombre_Vet', Ubicacion='$Ubicacion', Horario='$Horario', Telefono='$Telefono', Especialidad='$Especialidad', Imagen='$Imagen', Frame_Mapa='$Frame_Mapa' WHERE ID_Vet='$ID_Vet'";
$query = mysqli_query($conn, $sql);

if($query){
    Header("Location: vetAsociados.php");
}else{

}

?>