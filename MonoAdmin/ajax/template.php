<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";
require_once ROOT_PATH . "MonoContent/templates/templates_indexer.php";

Check(function(){
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