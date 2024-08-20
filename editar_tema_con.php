<?php
//Conexión de Prueba de editar tema de foro

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

 $ID_Tema = $_POST["ID_Tema"];
 $Titulo = $_POST['Titulo'];
 $Descripcion = $_POST['Descripcion'];
 $Fecha_creacion = null;
 $imagen = $_POST['imagen'];

 $sql = "UPDATE tab_temas_foro SET Titulo='$Titulo',Descripcion='$Descripcion',CURRENT_DATE, imagen='$imagen' WHERE ID_Tema='$ID_Tema'";
 $query = mysqli_query($conn, $sql);

 if($query){
    Header("Location: foro.php");
}else{

}

?>