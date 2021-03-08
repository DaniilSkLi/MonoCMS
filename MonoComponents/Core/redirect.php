<?php

function Redirect($url) {
    exit(header("Location: " . $url));
}