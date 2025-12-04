<?php  
/* FORMULARIO 1
    echo "Datos de la Reserva<br>";
    echo "Nombre: " .htmlspecialchars($_POST["nombre"]);
    echo "<br>Apellidos: " .htmlspecialchars($_POST["apellidos"]);
    echo "<br>Correo Electronico: " .htmlspecialchars($_POST["email"]);
    echo "<br>Telefono: " .htmlspecialchars($_POST["telefono"]);
*/

/* FORMULARIO 2 */
    switch ($_POST["oper"]) {
        case '+':
            echo "La suma de " .$_POST["num1"] ." + " .$_POST["num2"] ." = " .($_POST["num1"] + $_POST["num2"]);
            break;
        case '-':
            echo "La resta de " .$_POST["num1"] ." - " .$_POST["num2"] ." = " .($_POST["num1"] - $_POST["num2"]);
            break;
        case '*':
            echo "La multiplicacion de " .$_POST["num1"] ." * " .$_POST["num2"] ." = " .($_POST["num1"] * $_POST["num2"]);
            break;
        case '/':
            echo "La division de " .$_POST["num1"] ." / " .$_POST["num2"] ." = " .($_POST["num1"] / $_POST["num2"]);
            break;
        default:
            break;
    }
?>