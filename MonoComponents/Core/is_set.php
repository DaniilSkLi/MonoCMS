<?php

function MONO_isset($var, $else = NULL) {
    if (isset($var)) {
        return $var;
    }
    else {
        return $else;
    }
}