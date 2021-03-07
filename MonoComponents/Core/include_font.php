<?php

// На основе include_css. Это просто удобные обёртки.

// Include Font
function MONO_include_font($url) {
    MONO_include_css($url);
}

// Include Fonts array
function MONO_include_font_array($array) {
    MONO_include_css_array($array);
}