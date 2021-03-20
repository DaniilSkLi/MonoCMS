<?php

require_once "lib/check.php";
require_once "lib/getAxiosData.php";

Check(function() {
    $cmd = $_POST["command"];
    if ($cmd == "get") {
        echo json_encode(MONO_Settings::GetCategories());
    }
    else if ($cmd == "save") {
        $categories = $_POST["categories"];
        foreach ($categories as $category) {
            MONO_Settings::UpdateCategories($category["name"], $category["settings"]);
        }
    }
});