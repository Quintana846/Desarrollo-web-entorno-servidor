<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input id="usuario" name="usuario" type="text" placeholder="Introduce tu usuario"><br>

        <br><label for="passwd">Contraseña:</label>
        <input id="passwd" name="passwd" type="password" placeholder="Introduce tu contraseña">

        <br><br><button type="submit" name="login">Enviar</button>
    </form>

    <form action="nuevoUsuario.php" method="post">
        <br><button type="submit" name="login">Crear Nuevo Usuario</button>
    </form>

<!--PHP-->
    <?php
        session_start();

        $hn = 'localhost';
        $db = 'bdsimon';
        $un = 'root';
        $pw = '';   

        // Conexion a Base De Datos MySQL
        require_once 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db); //Orden: servidor, usuario, contraseña y base de datos
        if($conn->connect_error) die ("Fatal Error"); // Comprueba si se puede hacer la conexion

        if(isset($_POST['login'])){  // Comprueba si hay un boton que se llame login
            $nombre = $_POST['usuario'];
            $clave = $_POST['passwd'];
            
            $sql = "SELECT * FROM usuarios WHERE Nombre = '$nombre' AND Clave = '$clave'"; // Coincide con las variables de arriba
            $result  = $conn->query($sql); // Ejecuta la consulta en la BBDD y lo guarda en $result

            if($result->num_rows > 0){ // Comprueba si devolvio al menos una fila 
                $user = $result->fetch_assoc(); // Convierte la primera fila en un array asociativo 
                if($clave == $user['Clave']){ // Comprueba la contraseña introducida con la contraseña de la BBDD
                    $_SESSION['loggedin'] = true; // Marca usuario esta auntetificado en la sesion
                    $_SESSION['id'] = $user['Codigo']; // Guarda el id del usuario en la sesion 
                    $_SESSION['Nombre'] = $user['Nombre'];
                    header("Location: inicio.php");
                    exit();
                }
            } else {
                echo "<br>Contraseña o Usuario Incorrecto";
            }
        }
        $conn->close();
    ?>
</body>
</html>
