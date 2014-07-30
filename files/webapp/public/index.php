<?php
require_once('_config.php');

$GLOBALS["viewables"]["title"] = "Drupal Admin | Helping To Manage Your Drupal Instances";
$GLOBALS["viewables"]["route"] = 'login';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (isset($_POST['inputCode']))
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
}
elseif ($_SESSION["authenticated"] == 'true')
{
  $GLOBALS["viewables"]["route"] = 'show';
}

require_view('layout/wrapper');
