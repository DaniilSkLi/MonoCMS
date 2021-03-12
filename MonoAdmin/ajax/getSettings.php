<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";
require_once ROOT_PATH . "MonoAdmin/kill.php";

Check(function() {
    global $MONO_CONNECT, $MONO_HOST;

    $settings = $_POST["settings"];

    // SQL injected!
    $sql = "SELECT `title`, `value`, `type` FROM `".$MONO_HOST["table_prefix"]."changed_".$settings."`";

    $result = $MONO_CONNECT->query($sql);
    echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
});