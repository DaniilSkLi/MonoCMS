<?php

function GetFavicon() {
    if (file_exists("Favicons/custom.ico")) {
        echo "<link rel='shortcut icon' href='".ROOT_URI."MonoComponents/Favicons/custom.ico' type='image/x-icon'/>";
    }
    else {
        echo "<link rel='shortcut icon' href='".ROOT_URI."MonoComponents/Favicons/default.ico' type='image/x-icon'/>";
    }
}