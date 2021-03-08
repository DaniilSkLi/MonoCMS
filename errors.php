<?php

$err_code = $_GET["e"];

require_once __DIR__ . "/Mono-root.php";
require_once ROOT_PATH . "MonoComponents/Core/core.php";
require_once ROOT_PATH . "MonoContent/templates/templates_indexer.php";

$file = GetActiveThemePath() . "errors.php";

if (file_exists($file)) {
    require_once $file;
}
else {
    echo "Error: " . $err_code;
}