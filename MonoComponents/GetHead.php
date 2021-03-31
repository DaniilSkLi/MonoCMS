<?php

require_once __DIR__ . "/GetFavicon.php";

function GetHead($type) {
    GetFavicon();
    MONO_include_css_array(GetLibs($type."_CSS"));
    MONO_include_font_array(GetLibs($type."_Fonts"));
    MONO_include_js_array(GetLibs($type."_JS"));
}