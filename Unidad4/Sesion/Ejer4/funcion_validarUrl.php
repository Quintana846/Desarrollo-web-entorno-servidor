<?php
    function validar_url($url) {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
?>