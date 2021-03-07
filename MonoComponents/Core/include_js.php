<?php

// Include JS
function MONO_include_js($url) {
    echo "<script src=".$url."></script>";
}

// Include JS from array
function MONO_include_js_array($array) {
    foreach ($array as $url) {
        echo "<script src=".$url."></script>";
    }
}