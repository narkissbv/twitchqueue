<?php
  include_once('db_connect.php');
  if ($_GET) {
    if (isset($_GET['username'])) {
      $username = mysqli_real_escape_string($link, $_GET['username']);

      # Check whether viewer is alreay in queue
      $sql = "SELECT * FROM `queue` WHERE username='{$username}' AND deleted=0";
      $user_rs = mysqli_query($link, $sql);
      if (mysqli_num_rows($user_rs) > 0) {
        # remove user from queue
        $sql = "UPDATE `queue` SET deleted = 1 WHERE username='{$username}'";
        mysqli_query($link, $sql);
        die("{$username}, you have been removed from queue");
      } else {
        die("Sorry, {$username}, couldn't find you in queue");
      }
    } else {
      die("error: missing params");
    }
  } else {
    die("error: bad request");
  }
?>