<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";

Check(function(){
    global $MONO_CONNECT, $MONO_HOST;

    if (isset($_POST["path"])) {
        $table = $MONO_HOST["table_prefix"] . "settings";
        
        $sql = "UPDATE `$table` SET `value`='".$_POST["path"]."' WHERE `name`='active_theme'";
        
        $MONO_CONNECT->query($sql);
    }
    else {
        return 403;
    }
});