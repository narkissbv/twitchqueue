<?php
  header("Access-Control-Allow-Origin: *");
  header("Expires: on, 01 Jan 1970 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  include_once('db_connect.php');

  $sql = "SELECT username FROM `queue` WHERE deleted = 0 ORDER BY priority ASC";
  $rs = mysqli_query($link, $sql);
  $response = array();
  $resp = array();
  while ($row = mysqli_fetch_assoc($rs)) {
    array_push($response, $row['username']);
  }
  if (isset($_GET['method']) && $_GET['method'] == 'json') {
    die(json_encode($response));
  } else {
    echo "Current viewers in queue: ";
    foreach ($response as $key => $value) {
      echo $key + 1 . ": " . $value . ", ";
    }
  }
?>