<?php

require_once  __DIR__ . "/libs/getAll.php";

// Create tables
$ini = MONO_ini::Get(dirname(__DIR__) . "/Data/tables.ini", true);

foreach ($ini as $table => $columns) {
    $formatted_columns = array();
    foreach ($columns as $column => $value) {
        $formatted_columns[] = $column . " " . $value;
    }
    MONO_DB::CreateTable($table, $formatted_columns);
}

// Create account
MONO_AutorizationControl::SignUp($_POST["login"], $_POST["password"]);

// Menu init
MONO_AdminMenu::AddItem("MonoCMS", "https://github.com/DaniilSkLi/MonoCMS", "mono.ico");
MONO_AdminMenu::AddItem("Dashboard", "dashboard", "dashboard.svg");
MONO_AdminMenu::AddItem("Templates", "templates", "dashboard.svg");
MONO_AdminMenu::AddItem("Plugins", "plugins", "dashboard.svg");
MONO_AdminMenu::AddItem("Menu", "menu", "dashboard.svg");
MONO_AdminMenu::AddItem("Settings", "settings", "dashboard.svg");
MONO_AdminMenu::AddItem("Sign out", "signout", "dashboard.svg");

echo "END";