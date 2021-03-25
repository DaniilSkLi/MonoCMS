<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";

Check(function() {
    $cmd = $_POST["command"];

    if ($cmd == "get") {
        $lang = new MONO_Languages(LANG_PATH, "settings");

        $categories = MONO_Settings::GetCategories();

        foreach ($categories as $categoryKEY => $category) {
            $categories[$categoryKEY]["name"] = $lang->translate($category["name"]);

            foreach ($category["settings"] as $settingKEY => $setting) {
                $categories[$categoryKEY]["settings"][$settingKEY]["title"] = $lang->translate($setting["name"]);
            }
        }

        echo json_encode($categories);
    }
    else if ($cmd == "save") {
        $categories = $_POST["categories"];
        foreach ($categories as $category) {
            MONO_Settings::UpdateCategories($category["name"], $category["settings"]);
        }
    }
});