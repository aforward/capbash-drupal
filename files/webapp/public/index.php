<?php
require_once('_config.php');

$GLOBALS["viewables"]["title"] = "Drupal Admin | Helping To Manage Your Drupal Instances";
$GLOBALS["viewables"]["route"] = 'login';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inputCode']))
{
  $access_code = htmlspecialchars($_POST['inputCode']);

  if (AccessCode::authenticate($access_code))
  {
    $_SESSION["authenticated"] = 'true';

    $GLOBALS["viewables"]["route"] = 'show';
    $GLOBALS["viewables"]['messageType'] = "info";
    $GLOBALS["viewables"]['message'] = "Welcome back.";
  }
  else
  {
    $action = "login_error";
    unset($_SESSION["authenticated"]);

    $GLOBALS["viewables"]['messageType'] = "error";
    $GLOBALS["viewables"]['message'] = "Unable to authenticate, please try again.";
  }
}

if ($_SESSION["authenticated"] == 'true')
{
  $GLOBALS["viewables"]["route"] = 'show';
}


if ($GLOBALS["viewables"]["route"] == "show")
{

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if (isset($_POST["copyDefault"]) && isset($_POST["newName"]) && isset($_POST["newServer"])) {
      if (DrupalAdmin::copy_default($_POST["newName"], $_POST["newServer"]))
      {
        $GLOBALS["viewables"]['messageType'] = "info";
        $GLOBALS["viewables"]['message'] = "Created default {$_POST["newName"]} ({$_POST["newServer"]})";
      }
      else
      {
        $GLOBALS["viewables"]['messageType'] = "error";
        $GLOBALS["viewables"]['message'] = "Unable to create {$_POST["newName"]} ({$_POST["newServer"]})";
      }


    } elseif (isset($_POST["copySite"]) && isset($_POST["oldName"]) && isset($_POST["newName"]) && isset($_POST["newServer"])) {
      if (DrupalAdmin::copy_site($_POST["oldName"], $_POST["newName"], $_POST["newServer"]))
      {
        $GLOBALS["viewables"]['messageType'] = "info";
        $GLOBALS["viewables"]['message'] = "Created copy of {$_POST["oldName"]} into {$_POST["newName"]} ({$_POST["newServer"]})";
      }
      else
      {
        $GLOBALS["viewables"]['messageType'] = "error";
        $GLOBALS["viewables"]['message'] = "Unable to create copy of {$_POST["oldName"]} into {$_POST["newName"]} ({$_POST["newServer"]})";
      }

    }
  }

  $GLOBALS["viewables"]["sites"] = DrupalAdmin::ls();
}

require_view('layout/wrapper');
