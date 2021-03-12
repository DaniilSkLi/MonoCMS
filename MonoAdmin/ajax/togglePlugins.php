<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";
require_once ROOT_PATH . "MonoContent/Plugins/plugins_indexer.php";

Check(function() {
    global $MONO_CONNECT, $MONO_HOST;

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

        $sql = "UPDATE `$table` SET `value`='".json_encode($active)."' WHERE `name`='active_plugins'";
        $MONO_CONNECT->query($sql);
    }
    else {
        return 403;
    }
});