<?php



switch ($_POST["opcion_edad"]) {
    
    case '13':
        echo ("Eres una personita");
        break;

    case '18':
        echo (" todavía eres muy joven");
        break;

        case '30':
        echo ("eres una persona joven");
        break;

        case '50':
        echo ("Eres una personita eres una persona madura");

        case '70':
        echo ("Ya eres una persona mayor");
        break;

    default:
        echo "No mandaste tu edad";
        break;
}

?>