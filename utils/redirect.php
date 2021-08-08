<?php

function MONO_Redirect($url) {
    exit(header("Location: " . $url));
}