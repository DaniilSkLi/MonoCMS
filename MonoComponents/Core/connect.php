<?php

$MONO_HOST = GetHostIni();
$MONO_CONNECT = new PDO('mysql:dbname='.$MONO_HOST["db"].';host='.$MONO_HOST["host"], $MONO_HOST["login"], $MONO_HOST["password"]);