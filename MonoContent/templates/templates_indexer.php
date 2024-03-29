<?php
function GetTemplatesDir() {
    $dir = __DIR__;
    $dir = str_replace("\\", "/", $dir);

    $all_in_dir = scandir($dir);

    $dirs = [];
    foreach($all_in_dir as $item) {
        if (is_dir($dir . "/" . $item)) {
            if ($item != "." && $item != "..") {
                array_push($dirs, $item);
            }
        }
    }
    return $dirs;
}

function GetTemplates() {
    $dir = __DIR__;
    $dir = str_replace("\\", "/", $dir);

    $dirs = GetTemplatesDir();
    $templates = [];

    foreach ($dirs as $item) {
        $item_dir = scandir($dir . "/" . $item);
        if (in_array("info.ini", $item_dir) && in_array("index.php", $item_dir)) {
            $ini = MONO_ini::Get($dir . "/" . $item . "/info.ini");
            
            $theme = array(
                "ThemeName" => MONO_isset($ini["ThemeName"]),
                "ThemeDescription" => MONO_isset($ini["ThemeDescription"]),
                "ThemeAuthor" => MONO_isset($ini["ThemeAuthor"]),
                "ThemeVersion" => MONO_isset($ini["ThemeVersion"]),
                "ThemePath" => $dir . "/" . $item . "/",
                "ThemeActive" => false
            );

            $active = GetActiveThemePath();
            if (MONO_isset($theme["ThemePath"]) == $active) {
                $theme["ThemeActive"] = true;
            }

            array_push($templates, $theme);
        }
    }
    return $templates;
}

function GetActiveThemePath() {
    global $MONO_CONNECT, $MONO_HOST;
    
    $result = MONO_Config::Get("active_theme");
    
    if ($result == NULL) {
        $templates = GetTemplatesDir();
        $theme = __DIR__ . "/" . $templates[0] . "/";
        $theme = str_replace("\\", "/", $theme);

        MONO_Config::Set("active_theme", $theme);
        GetActiveThemePath();
    }
    else { 
        return $result;
    }
}