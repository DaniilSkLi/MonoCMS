<?php

class MONO_include {
    /* CSS */
    public static function css($url) {
        echo "<link rel='stylesheet' href=".$url.">";
    }
    public static function css_array($array) {
        foreach ($array as $url) {
            echo "<link rel='stylesheet' href=".$url.">";
        }
    }

    /* JS */
    function js($url) {
        echo "<script src=".$url."></script>";
    }
    function js_array($array) {
        foreach ($array as $url) {
            echo "<script src=".$url."></script>";
        }
    }

    /* Font */
    function font($url) {
        self::css($url);
    }
    function MONO_include_font_array($array) {
        self::css_array($array);
    }
}