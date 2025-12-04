<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cuenta</title>
</head>
<body>
    <h1>Crear Nuevo Usuario</h1>
    <form action="nuevoUsuario.php" method="post">
        <label for="usuario">Usuario:</label>
        <input id="usuario" name="usuario" type="text" placeholder="Introduce tu usuario"><br>

        <br><label for="usuario">Contraseña:</label>
        <input id="passwd" name="passwd" type="password" placeholder="Introduce tu contraseña"><br>
        
        <br><label for="usuario">Repita La Contraseña:</label>
        <input id="passwd2" name="passwd2" type="password" placeholder="Introduce de nuevo la contraseña">

        <br><br><button type="submit" name="login">Crear Usuario</button>
    </form>
    <?php
        // Inicio de sesion
        session_start();

        $hn = 'localhost';
        $db = 'bdsimon';
        $un = 'root';
        $pw = '';   

        $conn = new mysqli($hn, $un, $pw, $db);
        if($conn->connect_error) die("Fatal Error");

        // Comprobar formulario fue enviado
        if(isset($_POST['login'])){
            $nombre = $_POST['usuario'] ?? ''; // ?? '' Evita warnings
            $clave = $_POST['passwd'] ?? ''; 
            $clave2 = $_POST['passwd2'] ?? '';   
            
            if(empty($clave) ||empty($clave2)){
                echo "<br>Por favor, completa ambos campos de contraseña";
            } elseif($clave !== $clave2){
                echo "<br>Las contraseñas no coinciden";
            } else {  
                // Verificamos si el usuario esta creado
                // Sentencia SQL donde nombre se introduce despues con ?
                $sql = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE Nombre = ?");
                // Se vincula variable $nombre con ?, la "s" indica que es tipo string
                $sql->bind_param("s", $nombre);
                // Ejecuta la consulra con el valor incluido
                $sql->execute();
                // Vincula el resultado con la variable que devuelve el num de filas
                $sql->bind_result($count);
                // Obtiene resultado y almacena en $count
                $sql->fetch();
                $sql->close();

                if($count > 0){
                    echo "<br>El usuario ya existe";
                } else {
                    // Insertar nuevo usuario
                    $sql = $conn->prepare("INSERT INTO usuarios (Nombre, Clave) VALUES (?, ?)");
                    // Vincula parametros de $nombre y $clave a Nombre y Clave de BBDD
                    $sql->bind_param("ss", $nombre, $clave);
                    if($sql->execute()){
                        echo "Usuario creado correctamente";
                        header("Location: login.php");
                        exit(); 
                    } else {
                        echo "Error al crear usuario";
                    }
                    $sql->close();
                }
            }
        }
        $conn->close();
    ?>
</body>
</html>