<?php

class AdminMenu {
    public static function GetMenu() {
        global $MONO_CONNECT, $MONO_HOST;

        $sql = "SELECT * FROM `".$MONO_HOST["table_prefix"]."admin_menu`";
        $result = $MONO_CONNECT->query($sql);

        return $result->fetchAll();
    }
    public static function TheMenu() {
        $menu = AdminMenu::GetMenu();

        foreach ($menu as $item) {
            echo "<div class='item'><img src='view/Icons/Menu/dashboard.svg' alt='[SVG]'><span>".$item["name"]."</span></div>";
        }
    }
    public static function AddMenuItem($title, $file, $icon = "NULL") {
        global $MONO_CONNECT, $MONO_HOST;

        $sql = "INSERT INTO `mono_admin_menu`(`name`, `file`, `icon`) VALUES ('$title', '$file', '$icon')";
        
        $MONO_CONNECT->query($sql);
    }
}

class Menu {

}
