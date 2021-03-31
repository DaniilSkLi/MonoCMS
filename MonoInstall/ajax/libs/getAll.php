<?php

require_once dirname(dirname(dirname(__DIR__))) . "/Mono-root.php";
require_once ROOT_PATH . "MonoComponents/Core/core.php";
require_once ROOT_PATH . "MonoComponents/kill.php";

$_POST = json_decode(file_get_contents('php://input'), true);