<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";
require_once ROOT_PATH . "MonoContent/Templates/templates_indexer.php";

Check(function(){
    global $MONO_CONNECT, $MONO_HOST;

    $cmd = $_POST["command"];

    if ($cmd == "toggle") {
        if (isset($_POST["path"])) {            
            MONO_Config::Set("active_theme", $_POST["path"]);
        }
        else {
            return 403;
        }
    }
    else if ($cmd == "get") {
        echo json_encode(GetTemplates());
    }
});