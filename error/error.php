<?php

class MONO_Error {
    public static function CoreError($error, $solutions = array()) {
        $ini = new MONO_ini(CORE . "Data/info.ini");
        $info = $ini->Get();
        require_once __DIR__ . "/errorTemplate.php";
        unset($ini);
        exit();
    }
}