<?php
include("./actions/session.action.php");

spl_autoload_register(function ($class) {
  include './classes/' . $class . '.class.php';
});

$site = new site('./inc/header.inc.php', './inc/footer.inc.php');
$page = new page;


(function () {
  if (isset($_SESSION['id'])) {
    require("./actions/connect.action.php");
    $user_query = $mysqli->query("SELECT * FROM users WHERE id='$_SESSION[id]'");

    $_SESSION['user'] = $user_query->fetch_assoc();
  }
})();

function getAllUsers()
{
  require("./actions/connect.action.php");
  $users_query = $mysqli->query("SELECT * FROM users");

  return $users_query;
}
