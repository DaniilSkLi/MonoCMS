<?php

if (!isset($index)) {
    header("Location: ./");
    exit();
}



require_once ROOT_PATH . "MonoContent/templates/templates_indexer.php";

require_once GetActiveThemePath() . "index.php";