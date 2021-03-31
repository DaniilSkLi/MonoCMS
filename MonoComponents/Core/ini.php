<?php

class MONO_ini {

    public static function Get($path, $assoc = false) {
        $ini = parse_ini_file($path, $assoc);
        return $ini;
    }

    public static function Write($path, $data) {
        // assoc - not support
        $write_data = "";

        foreach ($data as $key => $value) {
            $write_data .= $key . " = '" . $value . "';\n";
        }

        file_put_contents($path, $write_data);
    }
    
}