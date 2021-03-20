<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";
require_once ROOT_PATH . "MonoContent/Templates/templates_indexer.php";

Check(function(){
    global $MONO_CONNECT, $MONO_HOST;

    $cmd = $_POST["command"];

    if ($cmd == "toggle") {
        if (isset($_POST["path"])) {
            $table = $MONO_HOST["table_prefix"] . "settings";
            
            $sql = "UPDATE `$table` SET `value`='".$_POST["path"]."' WHERE `name`='active_theme'";
            
            $MONO_CONNECT->query($sql);
        }
        else {
            return 403;
        }
    }
    else if ($cmd == "get") {
        echo json_encode(GetTemplates());
    }
});