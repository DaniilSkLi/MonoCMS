<?php

session_start();
session_unset();
session_destroy();

Redirect("index.php");