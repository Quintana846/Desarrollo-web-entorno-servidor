<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion de Formularios</title>
</head>
<body>
    <h1>Validacion de Formularios</h1>
    <form action="valSesiones.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre"s>

        <br><br>
        <label for="passwd">Contraseña: </label>
        <input type="password" id="passwd" name="passwd">

        <br><br>
        <label for="email">E-mail: </label>
        <input type="email" id="email" name="email">

        <br><br>
        <label for="website">Web Site: </label>
        <input type="url" id="website" name="website">

        <br><br>
        <label for="comentario">Comentario: </label>
        <textarea id="comentario" name="comentario" rows="4" cols="50" placeholder="Escribe tu comentario aquí..." ></textarea>
    
        <br><br>
        <label for="genero">Genero: </label>
        <input type="radio" id="masculino" name="genero" value="Masculino">Masculino
        <input type="radio" id="femenino" name="genero" value="Femenino">Femenino

        <br><br>
        <input type="submit" name="boton" value="Enviar">
    </form>

    <?php
        $errores = true;
        if(isset($_POST["boton"])){   // Hasta que no se envia no aparecen los datos
            $errores = false;
            echo "<h2>Tu información</h2>";
            $nombre = $_POST["nombre"] ? $_POST["nombre"] : '';
            $passwd = $_POST["passwd"] ?? '';
            $email = $_POST["email"];
            $website = $_POST["website"];
            $comentario = $_POST["comentario"];
            $genero = isset($_POST ["genero"]) ? $_POST ["genero"] : '';

            // Transformar género
            $generoDB = ($genero == "Masculino") ? 1 : 0;

            echo "<strong>Nombre: </strong>" .htmlspecialchars($nombre);
            echo "<strong><br>E-mail: </strong>" .htmlspecialchars($email);
            echo "<strong><br>Web Site: </strong>" .htmlspecialchars($website);
            echo "<strong><br>Comentario: </strong>" .htmlspecialchars($comentario);
            echo "<strong><br>Genero: </strong>" .htmlspecialchars($genero);

            include_once 'funcion_validarEmail.php';
            include_once 'funcion_validarUrl.php';
            $errores = false;
            if(!validar_email($email)){
                echo "<br>Email no valido";
                $errores = true;
            }
            if(!validar_url($website)){
                echo "<br>URL no valida";
                $errores = true;
            }

            $passwd = $_POST["passwd"] ?? '';

            // Validar Contraseña
            $patronPass = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
            if (!preg_match($patronPass, $passwd)) {
                echo "<br>La contraseña debe tener al menos 8 caracteres, incluir letras, números y un carácter especial.";
                $errores = true;
            }

            // Validar Nombre
            $nombre = $_POST["nombre"] ?? '';
            $patronNombre = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/";
            if (!preg_match($patronNombre, $nombre)) {
                echo "<br>Nombre no válido. Solo se admiten letras y espacios.";
                $errores = true;
            }
        }

        // Guardar en BBDD (si errores = false)
        if(!$errores){
            // Datos de conexión
            $hn = 'localhost';
            $db = 'bdusuario';
            $un = 'root';
            $pw = '';

            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

            // Encriptar contraseña
            $passwd_hashed = password_hash($passwd, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nombre, password, email, web, comentario, genero) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param("sssssi", $nombre, $passwd_hashed, $email, $website, $comentario, $generoDB);
            /*
                bind_param = vincula variables PHP a los parametros ?
                "ssssi" = s string // i integer
            */

            if($stmt->execute()){
                echo "<br>Datos Guardados Correctamente";
            } else {
                echo "<br>Error " .$stmt->error;
            }
        }
    ?>  
</body>
</html>