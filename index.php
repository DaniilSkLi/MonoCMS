<?php
$index = true;

require_once __DIR__ . "/Mono-root.php";

require_once ROOT_PATH . "MonoComponents/Core/core.php";

if (file_exists("MonoInstall")) {
    require_once ROOT_PATH . "MonoInstall/index.php";
}
else {
    require_once ROOT_PATH . "Mono-load.php";
}
