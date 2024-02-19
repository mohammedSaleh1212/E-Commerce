<?php

  function getRootConnection(){
    $host = "localhost";
    $db_name = "mystore";
    $username = "root";
    $password = "";

    $connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
    $connection->exec("SET CHARACTER SET UTF8");
    return $connection;
  }

  

  function checkToken($token) {
    return $token == 'abc';
  }

  function checkConnectionAuthorized($token) {
    return $_SERVER['REQUEST_METHOD'] == 'POST' && $token != "" && checkToken($token);
  }

  function checkUserIsActive($db) {
    return $db != "";
  }

  function checkRequiredFields($a='a',$b='b',$c='c',$d='d',$e='e',$f='f',$g='g',$h='h') {
    return $a != '' && $b != '' && $c != '' && $d != '' && $e != '' && $f != '' && $g != '' && $h != '';
  }

  function checkDateFormat($string) {
    if ($string <> "" && strtotime($string)) return true;
    else return false;
  }
  
?>