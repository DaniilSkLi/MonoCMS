<?php

$MONO_HOST = MONO_GetIni(__DIR__ . "/Data/connect.ini");
$MONO_CONNECT = new PDO('mysql:dbname='.$MONO_HOST["db"].';host='.$MONO_HOST["host"], $MONO_HOST["login"], $MONO_HOST["password"]);