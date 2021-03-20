<?php

function MONO_kill($error) {
    http_response_code($error);
    die();
}