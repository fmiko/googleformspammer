<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

  public static function add_data($var) {

    extract($var);
    $con = parent::connect();
    $url = $con->real_escape_string($url);
    $number = $con->real_escape_string($number);
    $submissions = $con->real_escape_string($submissions);
    $entry = $con->real_escape_string($entry);
    $value = $con->real_escape_string($value);

    $query = "LOCK TABLES data [READ | WRITE]";
    $ret = $con->query($query);
    $query = "INSERT INTO data (url, entry, value, submissions, number) VALUES ('{$url}', '{$entry}', '{$value}', '{$submissions}', '{$number}');";
    $ret = $con->query($query);
    if(!$ret) {
      print("MySQL Error : ");
      print($con->error);
      exit();
    }
    $query = "UNLOCK TABLES";
    $ret = $con->query($query);
    parent::close($con);
  }

}

?>
