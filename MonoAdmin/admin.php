<?php

require_once __DIR__ . "/check.php";

if (Check()) {
    if (MONO_AutorizationControl::Check()) {
        require_once __DIR__ . "/view/menu.php";
    }
    else {
        require_once __DIR__ . "/view/loginForm.php";
    }
}