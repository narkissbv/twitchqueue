<?php
  if(!isset($_SESSION)) { 
    session_start();
  }
  if ($_SESSION['active']) {
    if ($_POST) {
      if (isset($_POST['name'])) {
        include_once('db_connect.php');
        $name = mysqli_real_escape_string($link, $_POST['name']);
        $sql = "UPDATE `queue`
                SET deleted = 1
                WHERE username = '{$name}'";
        mysqli_query($link, $sql);
      } else {
        echo "missing name";
      }
    } else {
      echo "missing params";
    }
  } else {
    echo "no session";
  }
?>