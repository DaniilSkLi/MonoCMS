<?php

function KillErr($error) {
    MONO_Redirect(ROOT_URI . "errors.php?e=" . $error);
    MONO_kill($error);
}