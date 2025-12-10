<?php
    function validar_email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
?>