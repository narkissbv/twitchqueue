<?php
  include_once('db_connect.php');
  if ($_GET) {
    if (isset($_GET['username'])) {
      $username = mysqli_real_escape_string($link, $_GET['username']);

      # Check whether viewer is alreay in queue
      $sql = "SELECT * FROM `queue` WHERE username='{$username}' AND deleted=0";
      $user_rs = mysqli_query($link, $sql);
      if (mysqli_num_rows($user_rs) > 0) {
        die("${username}, you are already in queue. Please be patient");
      }

      $sql = "SELECT max(priority) as maxp FROM `queue`";
      $max_rs = mysqli_query($link, $sql);
      $row = mysqli_fetch_assoc($max_rs);
      $max_priority = (int)$row['maxp'] + 1;

      $sql = "INSERT INTO `queue` (username, priority) VALUES('{$username}', {$max_priority})";
      $result = mysqli_query($link, $sql);
      $success = true;
    } else {
      $success = false;
    }
  } else {
    $success = false;
  }
  if ($success) {
    die("{$username} added to queue");
  } else {
    die("error adding {$username} to queue");
  }

?>