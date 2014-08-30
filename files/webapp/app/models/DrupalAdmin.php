<?php

class DrupalAdmin
{

  private static $TEMPLATE_DIR = "/var/local/apps/admin_drupal/templates";
  private static $BIN = "/var/local/apps/admin_drupal/bin";
  private static $ROOT = '/var/local/apps/drupal';

  //---------------
  // API
  //---------------

  public static function ls_templates()
  {
    $all_templates = scandir(DrupalAdmin::$TEMPLATE_DIR);
    $all_templates = array_values(array_filter($all_templates, function($name) { return self::is_template($name); }));
    return $all_templates;
  }

  public static function ls()
  {
    $all_sites = scandir(DrupalAdmin::$ROOT);
    $all_sites = array_values(array_filter($all_sites, function($name) { return self::is_site($name); }));
    return $all_sites;
  }

  public static function copy_template($template, $name, $server)
  {
    return self::do_copy(self::template($template), $name, $server);
  }

  public static function copy_site($from_name, $to_name, $server)
  {
    if (self::is_site($from_name))
    {
      return do_copy(self::path($from_name), $to_name, $server);
    }
    else
    {
      return false;
    }
  }

  public static function is_enabled($name)
  {
    if (self::is_site($name))
    {
      return file_exists("/etc/nginx/sites-enabled/{$name}");
    }
    else
    {
      return false;
    }
  }

  public static function enable_site($name)
  {
    $enable = DrupalAdmin::$BIN . "/enable_site";
    $call = "{$enable} {$name}";
    shell_exec($call);
  }

  public static function disable_site($name)
  {
    $disable = DrupalAdmin::$BIN . "/disable_site";
    $call = "{$disable} {$name}";
    shell_exec($call);
  }

  public static function site_url_file($name)
  {
    if (self::is_site($name))
    {
      return self::path($name) . "/.url";
    }
    else
    {
      return null;
    }
  }

  public static function site_url_href($name)
  {
    $filename = self::site_url_file($name);
    if ($filename != null && file_exists($filename))
    {
      return file_get_contents($filename);
    }
    else
    {
      return null;
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

  public static function is_template($name)
  {
    if ($name == "." || $name == "..")
    {
      return false;
    }
    else
    {
      return is_dir(self::template($name));
    }
  }

  public static function template($name)
  {
    return DrupalAdmin::$TEMPLATE_DIR . "/$name/drupal";
  }

  public static function path($name)
  {
    return DrupalAdmin::$ROOT . "/$name";
  }

  private static function do_copy($from_path, $name, $server)
  {
    $copy = DrupalAdmin::$BIN . "/copy";
    $call = "{$copy} {$from_path} {$name} {$server}";
    shell_exec($call);
    return self::is_site($name);
  }

}