<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";
require_once ROOT_PATH . "MonoContent/plugins/plugins_indexer.php";

Check(function() {
    global $MONO_CONNECT, $MONO_HOST;

    $cmd = $_POST["command"];

    if ($cmd == "toggle") {
        if (isset($_POST["path"])) {
            $table = $MONO_HOST["table_prefix"] . "settings";
    
            $active = GetActivePlugin();
    
            $in_arr = array_search ($_POST["path"], $active);
    
            if ($in_arr === false) {
                array_push($active, $_POST["path"]);
            }
            else {
                unset($active[$in_arr]);
            }
            
            MONO_Config::Set("active_plugins", json_encode($active));
        }
        else {
            return 403;
        }
    }
    else if ($cmd == "get") {
        echo json_encode(GetPlugins());
    }
});