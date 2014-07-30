<?php

class DrupalAdmin
{

  private static $DEFAULT_SITE = "/var/apps/admin_drupal/config/drupal";
  private static $BIN = "/var/apps/admin_drupal/bin";
  private static $ROOT = '/var/apps/drupal';

  //---------------
  // API
  //---------------

  public static function ls()
  {
    $all_sites = scandir(DrupalAdmin::$ROOT);
    $all_sites = array_filter($all_sites, function($name) { return self::is_site($name); });
    return $all_sites;
  }

  public static function copy_default($name)
  {
    return self::do_copy(DrupalAdmin::$DEFAULT_SITE, $name);
  }

  public static function copy_site($from_name, $to_name)
  {
    if (self::is_site($from_name))
    {
      return do_copy(self::path($from_name), $to_name);
    }
    else
    {
      return false;
    }
  }

  //---------------
  // HELPERS
  //---------------

  public static function is_site($name)
  {
    if ($name == "." || $name == "..")
    {
      return false;
    }
    else
    {
      return is_dir(self::path($name));
    }
  }

  public static function path($name)
  {
    return DrupalAdmin::$ROOT . "/$name";
  }

  private static function do_copy($from_path, $name)
  {
    $copy = DrupalAdmin::$BIN . "/copy";
    $call = "{$copy} {$from_path} {$name}";
    echo shell_exec($call);
    return self::is_site($name);
  }

}