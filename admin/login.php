<?
    require 'db_connection.php';
    if(isset($_POST['submit']))
    {
      if(isset($_POST['email']) && isset($_POST['password']))
      {
        if($_POST['email'] == "admin@gmail.com" && $_POST['password'] == "admin")
        {
          session_start();
          $_SESSION['email'] = "admin@gmail.com";
          header('location: C:\xampp\htdocs\blood_donation\admin\index.php');
        }
        else
        {
          header('location: C:\xampp\htdocs\blood_donation\index.html');
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link rel="icon" type="image/x-icon" href="images\icon2.ico" />
    <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:300);

      .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
      }
      .form {
        position: relative;
        z-index: 1;
        background: #fbceb1;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2),
          0 5px 5px 0 rgba(0, 0, 0, 0.24);
      }
      .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        color: black;
        box-sizing: border-box;
        font-size: 18px;
      }
      .btn {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #800000;
        width: 100%;
        border: 0;
        padding: 15px;
        color: black;
        font-size: 20px;
        font-weight: 900;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
      }
      .btn :hover,
      .btn:active,
      .btn:focus {
        background: #800000;
      }

      .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
      }
      .container:before,
      .container:after {
        content: "";
        display: block;
        clear: both;
      }
      .container .info {
        margin: 50px auto;
        text-align: center;
      }

      body {
        background: #f6eded; /* fallback for old browsers */
        background: #b22222;
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }
    </style>
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <form class="login-form" action="admin\login.php" method="post" autocomplete="off">
          <input type="text" placeholder="Email" name = "email"/>
          <input type="password" placeholder="password" name = "password"/>
          <input class="btn" type="submit" name = "submit" placeholder="Login" />
        </form>
      </div>
    </div>
  </body>
</html>
