<?php

function GetLibs($type) {
    $libs = MONO_GetIniArray(__DIR__ . "/MonoDATA/libs.ini", true);
    if (isset($type)) {
        return $libs[$type];
    }
    else {
        return $libs;
    }
}