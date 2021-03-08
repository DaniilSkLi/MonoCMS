<?php
function GetPluginsDir() {
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

function GetPlugins() {
    $dir = __DIR__;
    $dir = str_replace("\\", "/", $dir);

    $dirs = GetPluginsDir();
    $plugins = [];

    foreach ($dirs as $item) {
        $item_dir = scandir($dir . "/" . $item);
        if (in_array("info.ini", $item_dir) && in_array("index.php", $item_dir)) {
            $ini = parse_ini_file($dir . "/" . $item . "/info.ini");
            
            $plugin = array(
                "PluginName" => MONO_isset($ini["PluginName"]),
                "PluginDescription" => MONO_isset($ini["PluginDescription"]),
                "PluginAuthor" => MONO_isset($ini["PluginAuthor"]),
                "PluginVersion" => MONO_isset($ini["PluginVersion"]),
                "PluginPath" => $dir . "/" . $item . "/",
                "PluginActive" => false
            );

            $active = GetActivePlugin();
            if (in_array($plugin["PluginPath"], $active)) {
                $plugin["PluginActive"] = true;
            }

            array_push($plugins, $plugin);
        }
    }
    return $plugins;
}

function GetActivePlugin() {
    global $MONO_CONNECT, $MONO_HOST;
    $table = $MONO_HOST["table_prefix"]."settings";
    $sql = "SELECT * FROM `$table` WHERE `name` = 'active_plugins'";
    
    $result = $MONO_CONNECT->query($sql);
    $result = $result->fetch();

    if (!is_array($result)) {        
        $sql = "INSERT INTO `$table` (`name`, `value`) VALUES ('active_plugins', '".json_encode(array())."')";
        $MONO_CONNECT->query($sql);
        GetActivePlugin();
    }
    else {
        return json_decode($result["value"], true);
    }
}