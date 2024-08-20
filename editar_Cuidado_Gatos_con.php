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


$ID_Cuidado_Gato = $_POST["ID_Cuidado_Gato"];
$Titulo = $_POST['Titulo'];
$Descripcion = $_POST['Descripcion'];
$Desarrollo = $_POST['Desarrollo'];
$Imagen = $_POST['Imagen'];

$sql = "UPDATE tab_cuidado_gatos SET Titulo='$Titulo',
            Descripcion='$Descripcion',
            Desarrollo='$Desarrollo',
            Imagen='$Imagen'
            WHERE ID_Cuidado_Gato='$ID_Cuidado_Gato'";
$query = mysqli_query($conn, $sql);

if ($query) {
    Header("Location: cuidadoGatos.php");
} else {
}