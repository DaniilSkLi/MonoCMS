<?php

function GetHostIni() {
    $ini = parse_ini_file(__DIR__ . "/Data/connect.ini");
    return $ini;
}