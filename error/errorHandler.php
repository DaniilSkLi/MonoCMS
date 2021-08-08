<?php

function errorHandler($n, $m, $f, $l, $c) {
    MONO_Error::CoreError($m, array("Line: " . $l, "File: " . $f));
    exit();
}

set_error_handler('errorHandler');