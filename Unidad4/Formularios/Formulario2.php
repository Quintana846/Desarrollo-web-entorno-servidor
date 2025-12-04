<?php
// Formulario 1
/*
    // isset comprueba si las variables existen y no son nulas
    if(isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["oper"])){
        // guarda los valores enviados en variables 
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $oper = $_POST["oper"];

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
    } else { // si las variables no existen, es decir si no se ejecuto 
        echo <<<_END
            <html>
                <form action="Formulario2.php" method="post">   
                    <label for="num1">Numero 1</label>
                    <input type="num" id="num1" name="num1" placeholder="Ingresa el Numero 1:" required>

                    <label for="num2">Numero 2</label>
                    <input type="num" id="num2" name="num2" placeholder="Ingresa el Numero 2: " required>

                    <label for="oper">Operador</label>
                    <input type="text" id="oper" name="oper" placeholder="+, -, *, / " required>

                    <button type="submit">Enviar</button>
                </form>
            </html>
        _END;
    }
*/

// Formulario 2 (Resultado Abajo)
/*
    echo <<<_END
            <html>
                <form action="Formulario2.php" method="post">   
                    <label for="num1">Numero 1</label>
                    <input type="num" id="num1" name="num1" placeholder="Ingresa el Numero 1:" required>

                    <label for="num2">Numero 2</label>
                    <input type="num" id="num2" name="num2" placeholder="Ingresa el Numero 2: " required>

                    <label for="oper">Operador</label>
                    <input type="text" id="oper" name="oper" placeholder="+, -, *, / " required>

                    <button type="submit">Enviar</button>
                </form>
            </html>
        _END;

    // isset comprueba si las variables existen y no son nulas
    if(isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["oper"])){
        // guarda los valores enviados en variables 
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $oper = $_POST["oper"];

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
    }
*/

// Formulario 3 (Resultado sale arriba)
    if(isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["oper"])){
            // guarda los valores enviados en variables 
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $oper = $_POST["oper"];

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
    }
    echo <<<_END
            <html>
                <form action="Formulario2.php" method="post">   
                    <label for="num1">Numero 1</label>
                    <input type="num" id="num1" name="num1" placeholder="Ingresa el Numero 1:" required>

                    <label for="num2">Numero 2</label>
                    <input type="num" id="num2" name="num2" placeholder="Ingresa el Numero 2: " required>

                    <label for="oper">Operador</label>
                    <input type="text" id="oper" name="oper" placeholder="+, -, *, / " required>

                    <button type="submit">Enviar</button>
                </form>
            </html>
        _END;
?>