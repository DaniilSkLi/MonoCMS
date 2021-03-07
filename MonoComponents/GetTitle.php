<?php

function GetTitle($type, $page) {
    $titles = parse_ini_file(__DIR__ . "/MonoDATA/titles.ini", true);
    return $titles[$type][$page];
}
function TheTitle($type, $page) {
    echo GetTitle($type, $page);
}