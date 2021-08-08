<?php

global $MONO_CONNECT;
$MONO_CONNECT = new MONO_Connect();
if (!$MONO_CONNECT->Try()) {
    MONO_Error::CoreError("Failed to connect to database.", array("Check the correctness of the data in \"Core/connect.ini\"", "Test the database if possible"));
}