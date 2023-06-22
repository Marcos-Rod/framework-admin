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

    //Formato de fecha completo
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

    //Formato de fecha personalizado
    public static function formatoFecha($fecha, $formato = "Y-m-d")
    {

        $fecha = new \DateTime($fecha);
        $formatoFecha = $fecha->format($formato);

        return $formatoFecha;
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

    //Validación de reCaptcha v3
    public static function validateCaptcha($secretKey, $token){

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $response = file_get_contents("$url?secret=$secretKey&response=$token");
        $response = json_decode($response, true);

        if($response['success'] && $response['score'] >= 0.7){
            return true;
        } else {
            return false;
        }
        
        return false;
    }

    //Subir archivo a un directiorio
    public static function uploadFile($file = array(), $dir = "/userfiles/images/")
    {
        $aleatorio = md5(uniqid(rand(), true));
        $strUnica = substr($aleatorio, 0, 5);
        $name_file = $strUnica . '-' . $file['name'];

        $temp = $file['tmp_name'];

        if (!is_dir($dir))
            mkdir($dir, 0777, true);
        
        //Subir archivo al servidor
        if (!move_uploaded_file($temp, $dir . $name_file))
            return false;

        return $name_file;
    }

    //Eliminar directorio o archivo
    public static function deleteFile($dir){

        echo $dir;
        
        if(!is_writable($dir)){
            return false;
        }

        unlink($dir);

        return true;
    }
    
}
