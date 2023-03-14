<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DumpHelper {
  private static $is_debug_off = false;
  
  public static function var_dump($param, $must_die = true) {
    if (self::$is_debug_off) return;
    
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
    
    echo '<pre>';
    debug_backtrace();
    echo '</pre>';
    
    if ($must_die) die;
  }

  public static function showMessage($message, $must_die = true) {
    if (self::$is_debug_off) return;

    echo "<pre>$message</pre>";

    echo '<pre>';
    debug_backtrace();
    echo '</pre>';

    if ($must_die) die();
  }
}
