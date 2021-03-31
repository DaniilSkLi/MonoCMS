<?php

$index = true;

require_once dirname(__DIR__) . "/Mono-root.php";

if (file_exists(ROOT_PATH . "MonoInstall")) {
    deleteDirectory(ROOT_PATH . "MonoInstall");
}

require_once ROOT_PATH . "/MonoComponents/Core/core.php";

require_once ROOT_PATH . "MonoComponents/GetLibs.php";
require_once ROOT_PATH . "MonoComponents/GetHead.php";

require_once ROOT_PATH . "MonoComponents/kill.php";

require_once __DIR__ . "/admin.php";



function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}