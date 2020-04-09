<?php
require("../session.action.php");
require("../connect.action.php");

$query = $mysqli->query("SELECT * FROM users ORDER by fname ASC");

if ($query->num_rows > 0) {
    while ($user = $query->fetch_assoc()) {
        include "../../views/admin/users_card.view.php";
    }
} else {
    include "../../views/admin/users_not_found.view.php";
}