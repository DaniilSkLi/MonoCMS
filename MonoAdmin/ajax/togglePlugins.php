<?php

require_once dirname(dirname(__DIR__)) . "/Mono-root.php";
require_once ROOT_PATH . "MonoComponents/Core/core.php";
require_once ROOT_PATH . "MonoContent/Plugins/plugins_indexer.php";

if (AutorizationControl::Check()) {
    $_POST = json_decode(file_get_contents('php://input'), true);

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
        Kill(403);
    }
}
else {
    Kill(403);
}