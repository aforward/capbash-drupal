<?php

class AccessCode
{

  public static function authenticate($access_code)
  {
    return $access_code == "@ACCESS_CODE@";
  }

}