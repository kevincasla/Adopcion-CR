// adoptar_perros_com.php
<?php
    $servername = 'localhost:3306';
    $username = 'root';
    $password = "";
    $database = 'adopcion_cr';
    
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $ID_Formulario = null;
    $nombre = $_POST['nombre'];
    $Telefono = $_POST['Telefono'];
    $Motivo = $_POST['Motivo'];
    $Tipo_Vivienda = $_POST['Tipo_Vivienda'];
    $Visitas_Hogar = $_POST['Visitas_Hogar'];
    $correo = $_POST['correo'];
    $Direccion = $_POST['Direccion'];
    $Edad = $_POST['Edad'];
    $Ocupacion = $_POST['Ocupacion'];
    $Propiedad_De_Vivienda = $_POST['Propiedad_De_Vivienda'];
    $Necesidades_Especiales = $_POST['Necesidades_Especiales'];
    $ID_Perro = $_POST['ID_Perro'];

    $sql = "INSERT INTO tab_formulario_perros VALUES('$ID_Formulario','$nombre','$Telefono','$Motivo','$Tipo_Vivienda','$Visitas_Hogar','$correo','$Direccion','$Edad','$Ocupacion',
    '$Propiedad_De_Vivienda','$Necesidades_Especiales','$ID_Perro')";
    $query = mysqli_query ($conn, $sql);

    if($query){
        Header("Location: adoptar_perros_foro.php");
    }else{

    }

?>