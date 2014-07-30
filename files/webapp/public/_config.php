<?php
if (function_exists('date_default_timezone_set')) date_default_timezone_set('America/New_York');

$GLOBALS["appDir"] = resolve_path("app");
$GLOBALS["viewables"] = array();
$GLOBALS["viewables"]["pageName"] = basename($_SERVER['PHP_SELF']);
$GLOBALS["viewables"]['layout'] = 'simple-layout';
$GLOBALS["files"] = resolve_path("files");
$GLOBALS["vendor"] = resolve_path("vendor");

session_start();

function resolve_path($name)
{
  if ($name == ".")
  {
    $publicRoot = $_SERVER["DOCUMENT_ROOT"] . "/..";
    $appRoot = $_SERVER["DOCUMENT_ROOT"];
  }
  else if ($_SERVER["DOCUMENT_ROOT"] != "")
  {
    $publicRoot = $_SERVER["DOCUMENT_ROOT"] . "/../$name";
    $appRoot = $_SERVER["DOCUMENT_ROOT"] . "/$name";
  }
  else
  {
    return "../{$name}";
  }

  return file_exists($publicRoot) ? realpath($publicRoot) : realpath($appRoot);
}

function __autoload($class_name)
{
  if (file_exists($GLOBALS["appDir"] . "/models/{$class_name}.php"))
  {
    require_once $GLOBALS["appDir"] . "/models/{$class_name}.php";
  }
}

function require_view($viewName,$locals = array())
{
  $GLOBALS["viewables"]["locals"] = $locals;
  require $GLOBALS["appDir"] . "/views/{$viewName}.html.php";
}

function require_helper($viewName,$locals = array())
{
  $GLOBALS["viewables"]["locals"] = $locals;
  require $GLOBALS["appDir"] . "/views/helpers/{$viewName}.func.php";
}


function setg($lookup,$val)
{
  $GLOBALS["viewables"][$lookup] = $val;
}

function r($lookup,$default = null)
{
  if (isset($_REQUEST[$lookup]))
  {
    return $_REQUEST[$lookup];
  }
  else
  {
    return $default;
  }
}

function l($lookup,$default = "")
{
  $locals = g("locals",array());
  if (isset($locals[$lookup]))
  {
    return $locals[$lookup];
  }
  else
  {
    return $default;
  }
}

function g($lookup,$default = "")
{
  if (isset($GLOBALS["viewables"][$lookup]))
  {
    return $GLOBALS["viewables"][$lookup];
  }
  else
  {
    return $default;
  }
}
