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

 
 $ID_Pregunta = null;
 $ID_Tema = $_POST['ID_Tema'];
 $Respuesta = $_POST['Respuesta'];
 $Fecha_creacion = null;
 $nombre_usuario = $_POST['nombre_usuario'];

 $sql = "INSERT INTO tab_preguntas_respuestas VALUES('$ID_Pregunta','$ID_Tema','$Respuesta',CURRENT_DATE,'$nombre_usuario')";
 $query = mysqli_query($conn, $sql);

 if($query){
     Header("Location: ver_tema.php?ID_Tema=$ID_Tema");
 }else{

 }

?>