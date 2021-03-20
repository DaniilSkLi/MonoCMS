<?php

class MONO_AdminMenu {
    // Получить массив с элементами меню
    public static function GetMenu() {
        global $MONO_CONNECT, $MONO_HOST;

        $sql = "SELECT * FROM `".$MONO_HOST["table_prefix"]."admin_menu`";
        $result = $MONO_CONNECT->query($sql);

        return $result->fetchAll();
    }

    // Вывести меню
    public static function TheMenu() {
        $menu = MONO_AdminMenu::GetMenu();

        foreach ($menu as $item) {
            echo "<div class='item'><img src='view/Icons/Menu/dashboard.svg' alt=''><span>".$item["name"]."</span></div>";
        }
    }

    public static function GetItemByFile($file_name) {
        global $MONO_CONNECT, $MONO_HOST;

        $sql = "SELECT * FROM `".$MONO_HOST["table_prefix"]."admin_menu` WHERE `file`='$file_name'";
        
        $result = $MONO_CONNECT->query($sql);
        return $result->fetch();
    }

    // Добавить элемент в меню
    public static function AddItem($title, $file, $icon = "NULL") {
        global $MONO_CONNECT, $MONO_HOST;

        $sql = "INSERT INTO `".$MONO_HOST["table_prefix"]."admin_menu`(`name`, `file`, `icon`) VALUES ('$title', '$file', '$icon')";
        
        $MONO_CONNECT->query($sql);
    }
}

class Menu {

}
