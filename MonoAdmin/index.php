<?php

if (file_exists(ROOT_PATH . "MonoInstall")) {
    rmdir(ROOT_PATH . "MonoInstall");
}

$index = true;

require_once dirname(__DIR__) . "/Mono-root.php";

require_once ROOT_PATH . "/MonoComponents/Core/core.php";

require_once ROOT_PATH . "MonoComponents/GetLibs.php";
require_once ROOT_PATH . "MonoComponents/GetHead.php";

require_once ROOT_PATH . "MonoComponents/kill.php";

require_once __DIR__ . "/admin.php";