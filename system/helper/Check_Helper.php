<?php
  function debug($var) {
    echo "<pre>";
    var_dump($var);
    die();
  }
  function ValCheck($arr, $key, $val)
  {
    return isset($arr[$key]) && $arr[$key] === $val;
  }

  function ValCheckGreater($arr, $key, $val)
  {
    return isset($arr[$key]) && $arr[$key] >= $val;
  }
