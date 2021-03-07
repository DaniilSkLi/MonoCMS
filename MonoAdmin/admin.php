<?php

if ($index)
{
    if (AutorizationControl::Check()) {
        require_once __DIR__ . "/view/menu.php";
    }
    else {
        require_once __DIR__ . "/view/loginForm.php";
    }
}
else {
    Header("Location: index.php");
    exit();
}