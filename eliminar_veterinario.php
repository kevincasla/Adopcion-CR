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

$ID_Vet=$_GET["id"];

$sql="DELETE FROM tab_veterinarios WHERE ID_Vet='$ID_Vet'";
$query = mysqli_query($conn, $sql);

if($query){
    Header("Location: vetAsociados.php");
}else{

}

?>