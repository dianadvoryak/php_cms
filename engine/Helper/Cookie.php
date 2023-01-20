<?php

namespace Engine\Helper;

class Cookie
{
  /**
   * Add cookies
   * @param $key
   * @param $value
   * @param int $time
   */
  public static function set($key, $value, $time = 31536000)
  {
    setcookie($key, $value, time() + $time, '/');
  }

  /**
   * Get cookie by key
   * @param $key
   * @return null
   */
  public static function get($key)
  {
    if (isset($_COOKIE[$key])) {
      return $_COOKIE[$key];
    }
    return null;
  }

  /**
   * Delete cookie by key
   * @param $key
   */
  public static function delete($key)
  {
    if(isset($_COOKIE[$key])){
      self::set($key, '', -3600);
      unset($_COOKIE[$key]);
    }
  }
}
