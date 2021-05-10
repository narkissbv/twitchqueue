<?php
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