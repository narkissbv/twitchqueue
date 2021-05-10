<?php
  if(!isset($_SESSION)) { 
    session_start();
  }
  if ($_POST) {
    if (isset($_POST['password'])) {
      $password = $_POST['password'];
      if ($password != '{aMf*V8k2T{)RPSf') {
        header("Location: /");
      } else {
        $_SESSION['active'] = true;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/script.js"></script>
  </head>
  <body>
  <div class="container">
      <div class="valign-wrapper h100">
        <div class="col">
          <h1 class="white-text">Cindy's Queue Manager</h1>
          <div class="card">
            <div class="card-content white-text">
              <span class="card-title">Manage the queue below</span>
            </div>
            <div class="card-content">
              <div class="list-container"></div>
            </div>
          </div>
        </div>
      </div>

      <template id="list-item">
        <div class="row">
          <div class="col s12 m6">
            <span class="priority white-text"></span>
            <span class="name white-text"></span>
          </div>
          <div class="col s12 m6 actions">
            <a class="btn-floating move-up">
              <i class="material-icons purple">arrow_upward</i>
            </a>
            <a class="btn-floating move-down">          
              <i class="material-icons purple">arrow_downward</i>
            </a>
            <a class="btn-floating delete">
              <i class="material-icons purple">delete</i>
            </a>
          </div>
        </div>
      </template>
  </body>
</html>

        <?php
      }
    }
  }

?>