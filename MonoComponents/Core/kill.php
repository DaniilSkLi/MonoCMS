<?php

function Kill($error) {
    http_response_code($error);
    die();
}