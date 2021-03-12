<?php

function KillErr($error) {
    Redirect(ROOT_URI . "errors.php?e=" . $error);
    Kill($error);
}