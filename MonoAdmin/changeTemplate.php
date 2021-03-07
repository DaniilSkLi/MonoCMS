<?php

require_once dirname(__DIR__) . "/Mono-root.php";
require_once ROOT_PATH . "MonoComponents/Core/core.php";

$_POST = json_decode(file_get_contents('php://input'), true);

$table = $MONO_HOST["table_prefix"] . "settings";

$sql = "UPDATE `$table` SET `value`='".$_POST["path"]."' WHERE `name`='active_theme'";

$MONO_CONNECT->query($sql);