<?php

class AccessCode
{

  public static function authenticate($access_code)
  {
    return $access_code == "@ACCESS_CODE@";
  }

  public static function webserver()
  {
    return "@DRUPAL_SERVER@";
  }

  public static function drupal_admin_server()
  {
    return "@DRUPAL_ADMIN_SERVER@";
  }

  public static function server_dir()
  {
    $server_dir = AccessCode::webserver() == "apache" ? "/etc/apache2" : "/etc/" . AccessCode::webserver();
    return $server_dir;
  }

  public static function log($name,$msg)
  {
    $ts = date("Y-m-d H:i:s");
    $logfile = AccessCode::webserver() == "apache" ? "/var/log/apache2/$name" : "/var/log/". $logfile ."/$name";
    $h = fopen($logfile, 'a');
    fwrite($h, "[$ts]: $msg\n");
    fclose($h);
  }

}