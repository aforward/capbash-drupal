<?php

class DrupalAdmin
{

  private static $TEMPLATE_DIR = "/data/admin_drupal/templates";
  private static $BIN = "/data/admin_drupal/bin";
  private static $ROOT = '/data/drupal';

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
    $conf_filename = AccessCode::server_dir() . "/sites-enabled/{$name}";
    if (AccessCode::webserver() == "apache")
    {
      $conf_filename = "${conf_filename}.conf";
    }

    if (self::is_site($name))
    {
      $answer = file_exists($conf_filename);
    }
    else
    {
      $answer = false;
    }

    AccessCode::log("admin_drupal.calls.log","ENABLED? ($answer): $conf_filename");
    return $answer;
  }

  public static function enable_site($name)
  {
    $enable = DrupalAdmin::$BIN . "/" . AccessCode::webserver() . "_enable_site";
    $call = "{$enable} {$name}";
    AccessCode::log("admin_drupal.calls.log","ENABLE SITE: $call");
    shell_exec($call);
  }

  public static function disable_site($name)
  {
    $disable = DrupalAdmin::$BIN . "/" . AccessCode::webserver() . "_disable_site";
    $call = "{$disable} {$name}";
    AccessCode::log("admin_drupal.calls.log","DISABLE SITE: $call");
    shell_exec($call);
  }

  public static function delete_site($name)
  {
    $delete = DrupalAdmin::$BIN . "/" . AccessCode::webserver() . "_delete_site";
    $call = "{$delete} {$name}";
    AccessCode::log("admin_drupal.calls.log","DELETE SITE: $call");
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
    $copy = DrupalAdmin::$BIN . "/" . AccessCode::webserver() . "_copy";
    $call = "{$copy} {$from_path} {$name} {$server}";
    AccessCode::log("admin_drupal.calls.log","COPY SITE: $call");
    shell_exec($call);
    return self::is_site($name);
  }

}