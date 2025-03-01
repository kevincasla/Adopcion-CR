<?php

use cweb\Member;

if (!empty($_POST["signup-btn"])) {
	require_once './Model/Member.php';
	$member = new Member();
	$registrationResponse = $member->registerMember();
}
?>
<HTML>

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adopción CR</title>
        <link rel="stylesheet" href="css_inicio_sesion.css">
        <link rel="stylesheet" href="css_Adopcion.css">
        <link rel="stylesheet" href="css_proyecto.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        
    </head>
<body>
    <header>
        <nav>
            <div class="logo">
                <link href='https://unpkg.com/css.gg@2.0.0/icons/css/user.css' rel='stylesheet'>
                <link rel="stylesheet" href="css_proyecto.css">
            </div>
            <ul class="nav-links">
                <li><a href="Proyecto.html"><svg xmlns="http://www.w3.org/2000/svg" height="40" width="100" viewBox="0 0 512 512"><path fill="#67c185" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/></svg></a></li>
                <li class="dropdown">
                    <a href="#">Adopción</a>
                    <ul class="dropdown-content">
                        <li><a href="adopcionGatos.html">Adopción de Gatos</a></li>
                        <li><a href="adopcionPerros.html">Adopción de Perros</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Cuidados</a>
                    <ul class="dropdown-content">
                        <li><a href="cuidadosPerros.html">Cuidados de Perros</a></li>
                        <li><a href="cuidadosGatos.html">Cuidados de Gatos</a></li>
                        <li><a href="cuidadosGenerales.html">Cuidados Generales</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Veterinarios</a>
                    <ul class="dropdown-content">
                        <li><a href="#"></a></li>
                        <li><a href="vetAsociados.php">Veterinaros Asociados</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Albergues</a>
                    <ul class="dropdown-content">
                        <li><a href="listaAlbergues.html">Lista de Albergues</a></li>
                        <li><a href="mapaAlbergues.html">Mapa de Albergues</a></li>
                    </ul>
                </li>
            </ul>
            <div class="auth-button">
                <a href="inicioSesion.html">Registrarse/Iniciar sesión</a>
            </div>
        </nav>
    </header>
    <?php
            if (!empty($registrationResponse["status"])) {
            ?>
                <?php
                if ($registrationResponse["status"] == "error") {
                ?>
                        <div class="content">
                            <div class="content-text"><a style="color: red;" >* </a><?php echo $registrationResponse["message"]; ?>
                            </div>
                        </div>
                <?php
                } else if ($registrationResponse["status"] == "success") {
                ?>
                    <div class="content">
                            <div class="content-text"><?php echo $registrationResponse["message"]; ?>
                            </div>
                        </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
        <div class="error-msg" id="error-msg"></div>

    <div class="login">
        <h1>Registro de Usuario</h1>
        <form name="sign-up" action="" method="post"  onsubmit="return signupValidation()">
       
            <label for="cedula">
                <i class="fas fa-id-card"></i>
            </label>
            <input type="text" name="cedula" placeholder="Cédula" id="cedula" required>
            
            <label for="nombre">
                <i class="fa fa-address-card"></i>
            </label>
            <input type="text" name="nombre" placeholder="Nombre" id="nombre" required>

            <label for="apellido">
                <i class="fa fa-user"></i>
            </label>
            <input type="text" name="apellido" placeholder="Apellido" id="apellido" required>

            <label for="correo">
                <i class="fas fa-at"></i>
            </label>
            <input type="text" name="correo" placeholder="Correo" id="correo" required>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="signup-password" placeholder="Contraseña" id="signup-password" required>


            <input type="submit" name="signup-btn"  id="signup-btn" value="Registrar usuario">
        </form>

    </div>

	<script>
		function signupValidation() {
			var valid = true;

			// $("#cedula").removeClass("error-field");
			// $("#correo").removeClass("error-field");
			// $("#password").removeClass("error-field");
			// $("#confirm-password").removeClass("error-field");

			var cedula = $("#cedula").val();
            var nombre = $("#nombre").val();
            var apellido = $("#apellido").val();
			var correo = $("#correo").val();
			var Password = $('#signup-password').val();
			var ConfirmPassword = $('#confirm-password').val();
			var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

			// $("#username-info").html("").hide();
			// $("#email-info").html("").hide();

			iif (!emailRegex.test(correo)) {
				$("#error-msg").html("No es un correo válido.").show();
				valid = false;
			}
			if (Password != ConfirmPassword) {
				$("#error-msg").html("Las dos contraseñas deben coincidir.").show();
				valid = false;
			}
			if (valid == false) {
				$('.error-field').first().focus();
				valid = false;
			}
            
			return valid;
		}

        document.getElementById('aceptar').addEventListener('click', function(event) {
        event.preventDefault(); // Previene la acción por defecto del enlace
        var contentDiv = document.getElementById('window-notice');
        contentDiv.classList.toggle('hidden'); 
    });
	</script>
</BODY>

</HTML>