<?php
session_start();

$isAdmin =
    $_SESSION['id'] === "f648a3d9e451b0c2c6ad5345cee0dc96" || $_SESSION['id'] === "cd08706f1f7fb06b6dbf08dc4fb1d436" ? true : false;