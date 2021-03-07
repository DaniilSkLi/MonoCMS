<?php

// Include CSS
function MONO_include_css($url) {
    echo "<link rel='stylesheet' href=".$url.">";
}

// Include CSS from array
function MONO_include_css_array($array) {
    foreach ($array as $url) {
        echo "<link rel='stylesheet' href=".$url.">";
    }
}