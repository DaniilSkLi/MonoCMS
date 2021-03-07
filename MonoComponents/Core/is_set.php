<?php

function MONO_isset($var) {
    if (isset($var)) {
        return $var;
    }
    else {
        return NULL;
    }
}