<?php
$baseURL = $_SERVER["HTTP_HOST"] === "localhost" ? "http://localhost" : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
header("Access-Control-Allow-Origin: " . $baseURL);
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

ini_set('display_errors', '1');

function ifAdmin()
{
  if (isset($_SESSION['id'])) {
    return $_SESSION['id'] === "f648a3d9e451b0c2c6ad5345cee0dc96" || $_SESSION['id'] === "cd08706f1f7fb06b6dbf08dc4fb1d436" ? 1 : 0;
  }
  return 0;
}

$isAdmin = ifAdmin();

function wvEncrypt($val)
{
  return md5(md5($val));
}

function createSession($md5email, $md5pass)
{
  $_SESSION["id"] = $md5email;
  $_SESSION["pass"] = $md5pass;
}

function addComma($number)
{
  return strrev(implode(",", str_split(strrev((string) $number), "3")));  // implode array with comma
}

class ActionMessage
{
  public $state;
  public $file;
  public $line;
  public $message;
  public $redirect;

  function __construct($state, $file, $line, $message, $redirect)
  {
    $this->state = $state;
    $this->file = $file;
    $this->line = $line;
    $this->message = $message;
    $this->redirect = $redirect;
  }

  function returnActionMessage()
  {
    return json_encode($this);
    exit();
  }
}
class customException extends Exception
{
  public function errorMessage()
  {
    //error message
    $errorMsg = new ActionMessage("danger", $this->getFile(), $this->getLine(), $this->getMessage(), "");
    return $errorMsg->returnActionMessage();
  }
}

function throwActionMessage($status, $msg, $redirect)
{
  $actionMsg = new ActionMessage($status, "", "", $msg, $redirect);
  print_r($actionMsg->returnActionMessage());
}

function ifPostIsEmpty($post)
{
  $emptyPostKeys = [];
  foreach ($post as $key => $value) {
    $emptyPostKeys[] = $value === "" ? $key : "";
  }

  count(array_values(array_filter($emptyPostKeys))) > 0 ? throwActionMessage("danger", "All fields are required", "") : "";
}

function ifEmailIsValid($email)
{
  filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE ? throwActionMessage("danger", "Enter a valid email address", "") : "";
}

function randId()
{
  return rand(pow(10, 100 - 1), pow(10, 100) - 1);
}
