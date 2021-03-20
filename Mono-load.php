<?php

if (!isset($index)) {
    MONO_Redirect("./");
}



require_once ROOT_PATH . "MonoContent/plugins/plugins_indexer.php";
require_once ROOT_PATH . "MonoContent/templates/templates_indexer.php";

$plugins = GetActivePlugin();
foreach ($plugins as $plugin) {
    require_once $plugin . "index.php";
}
require_once GetActiveThemePath() . "index.php";