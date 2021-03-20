<?php

if ($index)
{
    if (MONO_AutorizationControl::Check()) {
        require_once __DIR__ . "/view/menu.php";
    }
    else {
        require_once __DIR__ . "/view/loginForm.php";
    }
}
else {
    MONO_Redirect("index.php");
}