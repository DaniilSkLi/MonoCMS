<?php

function GetTitle($type, $page) {
    $titles = parse_ini_file(__DIR__ . "/MonoDATA/titles.ini", true);
    if (isset($titles[$type][$page])) {
        return $titles[$type][$page];
    }
    else {
        return NULL;
    }
}
function TheTitle($type, $page) {
    echo GetTitle($type, $page);
}