<?php
    require 'C:\xampp\htdocs\blood_donation\db_connection.php';
    session_start();
    if($_SESSION['admin'] != true)
    {
      echo "<script>alert('login first !!')</script>";
      header('Location: admin_login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images\icon2.ico" />
    <title>Admin</title>
    <style>
      html,
      body {
      height: 100%;
      }

      body {
      margin: 0;
      background-color: #292929;
      overflow: hidden;
      }

      nav {
      position: absolute;
      top: 50%;
      right: 0;
      left: 0;
      width: 600px;
      display: table;
      margin: 0 auto;
      transform: translateY(-50%);
      }

      nav a {
      font-size: 20px;
      position: relative;
      width: 600px;
      display: table-cell;
      text-align: center;
      color: #949494;
      text-decoration: none;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-weight: bold;
      padding: 10px 20px;
      transition: 0.2s ease color;
      }

      nav a:before,
      nav a:after {
      content: "";
      position: absolute;
      border-radius: 50%;
      transform: scale(2);
      transition: 0.3s ease transform;
      }

      nav a:before {
      top: 0;
      left: 10px;
      width: 10px;
      height: 6px;
      }

      nav a:after {
      top: 5px;
      left: 18px;
      width: 4px;
      height: 4px;
      }

      nav a:nth-child(1):before {
      background-color: yellow;
      }

      nav a:nth-child(1):after {
      background-color: red;
      }

      nav a:nth-child(2):before {
      background-color: #00e2ff;
      }

      nav a:nth-child(2):after {
      background-color: #89ff00;
      }

      nav a:nth-child(3):before {
      background-color: purple;
      }

      nav a:nth-child(3):after {
      background-color: palevioletred;
      }

      #indicator {
      position: absolute;
      left: 10%;
      bottom: 0;
      width: 75px;
      height: 3px;
      background-color: #fff;
      border-radius: 5px;
      transition: 0.2s ease left;
      }

      nav a:hover {
      color: #fff;
      }

      nav a:hover:before,
      nav a:hover:after {
      transform: scale(1);
      }

      nav a:nth-child(1):hover ~ #indicator {
      background: linear-gradient(130deg, yellow, red);
      }

      nav a:nth-child(2):hover ~ #indicator {
      left: 44%;
      background: linear-gradient(130deg, #00e2ff, #89ff00);
      }

      nav a:nth-child(3):hover ~ #indicator {
      left: 77%;
      background: linear-gradient(130deg, purple, palevioletred);
      }
      h3 {
      color: white;
      font-size: 40px;
      text-align: center;
      top: 10%;
      }
</style>
</head>
<body>
    <div>
        <h3>WELCOME ADMIN<h3>
      </div>
      <nav>
        <a href="display.php">USERS LIST</a>
        <a href="blood.php">STATISTICS</a>
        <a href="logout.php">Logout</a>
        <div id="indicator"></div>
      </nav>
</body>
</html>