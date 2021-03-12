<?php

require_once dirname(dirname(dirname(__DIR__))) . "/Mono-root.php";
require_once ROOT_PATH . "MonoComponents/Core/core.php";
require_once ROOT_PATH . "MonoAdmin/kill.php";

function Check($func) {
    if (AutorizationControl::Check()) {
        $err = $func();
        if (isset($err)) {
            KillErr($func());
        }
    }
    else {
        KillErr($func());
    }
}