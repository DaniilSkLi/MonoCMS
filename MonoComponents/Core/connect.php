<?php

$MONO_HOST;
$MONO_CONNECT;

function MONO_TryConnect() {
    global $MONO_CONNECT, $MONO_HOST;

    try {
        $MONO_HOST = MONO_ini::Get(__DIR__ . "/Data/connect.ini");
        $MONO_CONNECT = new PDO('mysql:dbname='.$MONO_HOST["db"].';host='.$MONO_HOST["host"], $MONO_HOST["login"], $MONO_HOST["password"]);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

MONO_TryConnect();