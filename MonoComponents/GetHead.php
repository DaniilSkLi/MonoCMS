<?php

require_once __DIR__ . "/GetFavicon.php";

function GetHead() {
    GetFavicon();
    MONO_include_css_array(GetLibs("Admin_CSS"));
    MONO_include_js_array(GetLibs("Admin_JS"));
}