<?php

function GetLibs($type) {
    $libs = MONO_ini::Get(__DIR__ . "/MonoDATA/libs.ini", true);
    if (isset($type)) {
        return $libs[$type];
    }
    else {
        return $libs;
    }
}