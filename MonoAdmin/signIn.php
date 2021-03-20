<?php

require_once dirname(__DIR__) . "/Mono-root.php";
require_once ROOT_PATH . "MonoComponents/Core/core.php";

$FormData = json_decode(file_get_contents("php://input"));

if (isset($FormData->login) && isset($FormData->password)) {
    if (MONO_AutorizationControl::SignIn($FormData->login, $FormData->password)) {
        echo "refresh";
    }
    else {
        Error();
    }
}
else {
    Error();
}

function Error() {
    echo "Invalid login or password.";
}