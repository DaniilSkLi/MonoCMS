<?php

class MONO_Settings {
    private static $prefix = "AdminPanelSettings_";

    private static function IsAdminPanelSettings($category) {
        if (strpos($category, self::$prefix) === false)
            return false;
        else
            return true;
    }

    private static function CategoryFix(&$category) {  
        if (!self::IsAdminPanelSettings($category)) {
            $category = self::$prefix . $category;
        }
    }

    // Categories
    public static function GetCategories() {
        global $MONO_CONNECT, $MONO_HOST;

        $sql = "SELECT `name`, `value` FROM `".$MONO_HOST["table_prefix"]."settings`";
        $result = $MONO_CONNECT->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);

        $categories = array();

        foreach ($result as $category) {
            if (self::IsAdminPanelSettings($category["name"])) {
                $categories[$category["name"]] = array("name" => str_replace(self::$prefix, "", $category["name"]), "settings" => json_decode($category["value"], true));
            }
        }

        return $categories;
    }

    public static function CreateCategory($category) {
        global $MONO_CONNECT, $MONO_HOST;
        self::CategoryFix($category);

    }

    public static function UpdateCategories($category, $Settings) {
        global $MONO_CONNECT, $MONO_HOST;
        self::CategoryFix($category);

        $Settings = json_encode($Settings);

        $sql = "UPDATE `".$MONO_HOST["table_prefix"]."settings` SET `value` = '$Settings' WHERE `name` = '$category'";

        try {
            $result = $MONO_CONNECT->query($sql);
        }
        catch (PDOException $error) {
            MONO_Debug($error->getMessage());
            return null;
        }
    }

    public static function DeleteCategory($category) {
        global $MONO_CONNECT, $MONO_HOST;
        self::CategoryFix($category);

    }

    // Settings - more
    public static function GetSettings($category) {
        global $MONO_CONNECT, $MONO_HOST;
        self::CategoryFix($category);

        $sql = "SELECT `value` FROM `".$MONO_HOST["table_prefix"]."settings` WHERE `name` = '$category'";
        
        try {
            $result = $MONO_CONNECT->query($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC)["value"];
            $settings = json_decode($result, true);
            return $settings;
        }
        catch (PDOException $error) {
            MONO_Debug($error->getMessage());
            return null;
        }
    }

    // Setting
    public static function GetSetting($category, $setting) {
        global $MONO_CONNECT, $MONO_HOST;
        self::CategoryFix($category);

        return self::GetSettings($category)[$setting];
    }

    public static function SetSetting($category, $setting, $value) {
        self::CategoryFix($category);

        $Settings = self::GetSettings($category);
        // $Settings[$setting] = $value;
        $Settings[$setting] = array("name" => $setting, "value" => $value);

        self::UpdateCategories($category, $Settings);
    }

    public static function DeleteSetting($category, $setting) {
        global $MONO_CONNECT, $MONO_HOST;
        self::CategoryFix($category);

        $Settings = self::GetSettings($category);
        unset($Settings[$setting]);

        self::UpdateCategories($category, $Settings);
    }
}