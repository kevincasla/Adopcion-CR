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
 

$ID_Albergue = $_POST["ID_Albergue"];
$Nombre_Albergue = $_POST['Nombre_Albergue'];
$Ubicacion = $_POST['Ubicacion'];
$Horario = $_POST['Horario'];
$Imagen = $_POST['Imagen'];
$Frame_Mapa = $_POST['Frame_Mapa'];

$sql="UPDATE tab_albergue SET Nombre_Albergue='$Nombre_Albergue', Ubicacion='$Ubicacion', Horario='$Horario', Imagen='$Imagen', Frame_Mapa='$Frame_Mapa' WHERE ID_Albergue='$ID_Albergue'";
$query = mysqli_query($conn, $sql);

if($query){
    Header("Location: listaAlbergues.php");
}else{

}

?>