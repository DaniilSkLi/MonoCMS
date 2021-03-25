<?php

function Check() {
    global $index;

    if (isset($index))
    {
        return true;
    }
    else {
        require_once dirname(__DIR__) . "/Mono-root.php";
        require_once ROOT_PATH . "/MonoComponents/Core/core.php";
        
        MONO_Redirect(ROOT_URI . "MonoAdmin/");
    }
}