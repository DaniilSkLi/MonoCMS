<?php

function KillErr($error) {
    Kill($error);
    Redirect(ROOT_URI . "errors.php?e=" . $error);
}