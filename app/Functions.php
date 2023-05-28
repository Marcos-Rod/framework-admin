<?php

namespace App;

class Functions
{

    //fecha actual
    public static function hoy($format = "Y-m-d H:i:s")
    {
        date_default_timezone_set('America/Mexico_City');
        return date($format, time());
    }

    public static function fechaFormateada($fecha = "")
    {
        if ($fecha == "")
            return false;

        $arr_fechafull = explode(" ", $fecha);

        $arr_fecha = explode("-", $arr_fechafull[0]);

        $arr_dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
        $arr_meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        return $arr_dias[$arr_fecha[2]] . " " . $arr_fecha[2] . " de " . $arr_meses[$arr_fecha[1] - 1] . " del " . $arr_fecha[0];
    }

    public static function encrypt($string, $key)
    {
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }

        return base64_encode($result);
    }

    public static function decrypt($string, $key)
    {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }

    public static function generatePassword($password)
    {
        return password_hash(trim($password), PASSWORD_DEFAULT);
    }

    //Corta una cadena sin cortar palabras
    public static function cortaCadena($txt = "", $long = 0, $break = " ", $pad = "...")
    {
        if (strlen($txt) <= $long)
            return $txt;
        // is $break present between $long and the end of the txt?
        if (false !== ($breakpoint = strpos($txt, $break, $long))) {
            if ($breakpoint < (strlen($txt) - 1)) {
                $txt = substr($txt, 0, $breakpoint) . $pad;
            }
        }
        return $txt;
    }
}
