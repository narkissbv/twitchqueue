<?php
  if(!isset($_SESSION)) { 
    session_start();
  }
  if ($_SESSION['active']) {
    if ($_POST) {
      if (isset($_POST['name'])) {
        include_once('db_connect.php');
        $name = mysqli_real_escape_string($link, $_POST['name']);
        $sql1 = "SELECT * FROM `queue`
                WHERE username = '{$name}'
                AND deleted = 0";
        $user_rs = mysqli_query($link, $sql1);
        $user = mysqli_fetch_assoc($user_rs);
        $priority = (int)$user['priority'] - 1;

        $sql2 = "SELECT * FROM `queue` WHERE priority = {$priority}";
        $other_rs = mysqli_query($link, $sql2);
        $other = mysqli_fetch_assoc($other_rs);

        $sql3 = "UPDATE `queue`
                SET priority = {$priority}
                WHERE username = '{$name}'";
        mysqli_query($link, $sql3);
        $priority += 1;
        $other_name = $other['username'];
        $sql4 = "UPDATE `queue`
                SET priority = {$priority}
                WHERE username = '{$other_name}'
                AND deleted = 0";
        mysqli_query($link, $sql4);
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