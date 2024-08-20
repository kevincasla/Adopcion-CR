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

$ID_Cuidado_Perro=$_GET["id"];

$sql="DELETE FROM tab_cuidado_perros WHERE ID_Cuidado_Perro='$ID_Cuidado_Perro'";
$query = mysqli_query($conn, $sql);

if($query){
    Header("Location: cuidadoPerros.php");
}else{

}

?>