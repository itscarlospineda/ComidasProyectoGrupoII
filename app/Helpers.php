<?php

// app/Helpers.php

if (! function_exists('is_json')) {
    /**
     * Verifica si una cadena es un JSON válido.
     *
     * @param string $string
     * @return bool
     */
    function is_json($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
