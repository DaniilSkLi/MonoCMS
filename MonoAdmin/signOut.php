<?php

require_once dirname(__DIR__) . "/Mono-root.php";

require_once ROOT_PATH . "MonoComponents/Core/core.php";

session_start();
session_unset();
session_destroy();

MONO_Redirect("index.php");