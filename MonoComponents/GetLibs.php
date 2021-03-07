<?php

function GetLibs($type) {
    $libs = parse_ini_file(__DIR__ . "/MonoDATA/libs.ini", true);
    if (isset($type)) {
        return $libs[$type];
    }
    else {
        return $libs;
    }
}