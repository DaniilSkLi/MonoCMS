<?php

require_once  __DIR__ . "/libs/getAll.php";

$iniPath = ROOT_PATH . "MonoComponents/Core/Data/connect.ini";

$ini = MONO_ini::Get($iniPath);

$ini["db"] = $_POST["db"];
$ini["host"] = $_POST["host"];
$ini["login"] = $_POST["login"];
$ini["password"] = $_POST["password"];
$ini["table_prefix"] = $_POST["prefix"];

MONO_ini::Write($iniPath, $ini);

echo MONO_TryConnect();