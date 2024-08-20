<?php
// Prueba para eliminar tema de foro
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

$ID_Tema=$_GET["ID_Tema"];

$sql="DELETE FROM tab_temas_foro WHERE ID_Tema='$ID_Tema'";
$query = mysqli_query($conn, $sql);

if($query){
    Header("Location: foro.php");
}else{

}

?>