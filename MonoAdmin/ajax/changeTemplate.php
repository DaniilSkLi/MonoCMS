<?php

require_once dirname(dirname(__DIR__)) . "/Mono-root.php";
require_once ROOT_PATH . "MonoComponents/Core/core.php";

if (AutorizationControl::Check()) {
    $_POST = json_decode(file_get_contents('php://input'), true);

    if (isset($_POST["path"])) {
        $table = $MONO_HOST["table_prefix"] . "settings";
        
        $sql = "UPDATE `$table` SET `value`='".$_POST["path"]."' WHERE `name`='active_theme'";
        
        $MONO_CONNECT->query($sql);
    }
    else {
        Kill();
    }
}
else {
    Kill();
}

function Kill() {
    http_response_code(403);
    die();
}