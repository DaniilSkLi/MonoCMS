<?php

function MONO_GetIni($path) {
    $ini = parse_ini_file($path);
    return $ini;
}

function MONO_GetIniArray($path) {
    $ini = parse_ini_file($path, true);
    return $ini;
}