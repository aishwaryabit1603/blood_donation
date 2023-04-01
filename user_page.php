<?php
    require 'db_connection.php';
    session_start();
    if (!isset($_SESSION['email'])) 
    {
        echo '<script>alert("You have to log in first")</script>';
        header('location: login.html');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>USER PAGE</title>
    <link rel="icon" type="image/x-icon" href="images\icon2.ico" />
  </head>
  <body>
      <!-- information of the user logged in -->
      <!-- welcome message for the logged in user -->
      <?php 
      if (isset($_SESSION['email']))
        {
          $email = $_SESSION['email'];
          echo '$email';
        }
      ?>
        Welcome
  
      <div class = "container">
        <a href="logout.php" style="color: red">
          Logout
        </a>
    </div>
    </div>
  </body>
</html>
